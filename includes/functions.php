<?php
require __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$required = ['student_name', 'student_id', 'email', 'institution', 'program', 'year_of_study', 'family_income', 'gpa', 'need_level', 'need_description'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        header('Location: application.php?error=Please complete all required fields.');
        exit;
    }
}

$applications = readJson(__DIR__ . '/data/applications.json');
$studentName = trim($_POST['student_name']);
$email = trim($_POST['email']);
$studentId = trim($_POST['student_id']);
$institution = trim($_POST['institution']);
$program = trim($_POST['program']);
$yearOfStudy = intval($_POST['year_of_study']);
$familyIncome = floatval($_POST['family_income']);
$gpa = floatval($_POST['gpa']);
$needLevel = intval($_POST['need_level']);
$needDescription = trim($_POST['need_description']);
$status = trim($_POST['status'] ?? 'pending');

if ($gpa > 4 || $gpa < 0) {
    header('Location: application.php?error=GPA must be between 0 and 4.');
    exit;
}

$eligibilityScore = calculateEligibilityScore($gpa, $familyIncome, $needLevel);
$recommendedAward = calculateRecommendedAward($eligibilityScore, $familyIncome);

$newApplication = [
    'id' => generateApplicationId(),
    'student_name' => $studentName,
    'student_id' => $studentId,
    'email' => $email,
    'institution' => $institution,
    'program' => $program,
    'year_of_study' => $yearOfStudy,
    'family_income' => $familyIncome,
    'gpa' => number_format($gpa, 2, '.', ''),
    'need_level' => $needLevel,
    'need_description' => $needDescription,
    'status' => $status,
    'eligibility_score' => $eligibilityScore,
    'recommended_award' => number_format($recommendedAward, 2, '.', ''),
    'created_at' => date('Y-m-d H:i:s')
];

$applications[] = $newApplication;
writeJson(__DIR__ . '/data/applications.json', $applications);

header('Location: index.php?success=1');
exit;
