:root {
  --primary: #1d4ed8;
  --primary-dark: #173ea7;
  --success: #16a34a;
  --warning: #f59e0b;
  --danger: #dc2626;
  --bg: #f3f6fb;
  --card: #ffffff;
  --text: #1f2937;
  --muted: #65758a;
  --border: #d9e2ec;
  --shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(180deg, #eef5ff 0%, #f8fbff 100%);
  color: var(--text);
}

a {
  color: inherit;
  text-decoration: none;
}

button, input, select, textarea {
  font: inherit;
}

.container {
  width: min(1120px, calc(100% - 32px));
  margin: 0 auto;
}

.topbar {
  background: #fff;
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 10;
}

.nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  min-height: 72px;
}

.brand {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 700;
}

.brand-mark {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: linear-gradient(135deg, var(--primary), #4f46e5);
  color: white;
  display: grid;
  place-items: center;
  font-size: 0.9rem;
}

nav {
  display: flex;
  align-items: center;
  gap: 18px;
  color: var(--muted);
  font-weight: 600;
}

.hero {
  padding: 72px 0 48px;
}

.hero-grid {
  display: grid;
  grid-template-columns: 1.3fr 0.7fr;
  gap: 30px;
  align-items: center;
}

.eyebrow {
  color: var(--primary);
  text-transform: uppercase;
  font-size: 0.78rem;
  letter-spacing: 0.12em;
  font-weight: 700;
  margin-bottom: 10px;
}

h1, h2, h3 {
  margin-top: 0;
}

.hero h1 {
  font-size: clamp(2.3rem, 4vw, 4rem);
  line-height: 1.08;
  margin-bottom: 16px;
}

.lead {
  font-size: 1.07rem;
  color: var(--muted);
  max-width: 620px;
  margin-bottom: 26px;
}

.hero-actions {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border: none;
  border-radius: 12px;
  padding: 12px 18px;
  font-weight: 700;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn:hover {
  transform: translateY(-1px);
}

.btn-primary {
  background: linear-gradient(135deg, var(--primary), #4f46e5);
  color: white;
  box-shadow: var(--shadow);
}

.btn-secondary {
  background: #eef4ff;
  color: var(--primary);
}

.btn-small {
  padding: 8px 12px;
  font-size: 0.82rem;
}

.full-width {
  width: 100%;
}

.hero-card {
  background: rgba(255, 255, 255, 0.82);
  border: 1px solid rgba(209, 224, 245, 0.9);
  border-radius: 24px;
  padding: 24px;
  box-shadow: var(--shadow);
  display: grid;
  gap: 18px;
}

.mini-card {
  background: #f8faff;
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 18px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.mini-card span {
  color: var(--muted);
}

.mini-card strong {
  font-size: 1.5rem;
}

.mini-card.highlight {
  background: linear-gradient(135deg, rgba(29, 78, 216, 0.08), rgba(79, 70, 229, 0.1));
}

.stats {
  display: grid;
  grid-template-columns: repeat(4, minmax(160px, 1fr));
  gap: 18px;
  margin-top: 10px;
}

.stat-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 20px;
  box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
}

.stat-card span {
  color: var(--muted);
  display: block;
  margin-bottom: 10px;
}

.stat-card strong {
  font-size: clamp(1.5rem, 2vw, 2rem);
}

.stat-card.accent { border-top: 4px solid var(--primary); }
.stat-card.warning { border-top: 4px solid var(--warning); }
.stat-card.success { border-top: 4px solid var(--success); }

.info-section {
  padding: 70px 0 90px;
}

.section-heading {
  margin-bottom: 28px;
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(220px, 1fr));
  gap: 24px;
}

.feature-item {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 18px;
  box-shadow: 0 12px 30px rgba(15, 23, 42, 0.03);
  padding: 26px 22px;
}

.feature-item h3 {
  margin-bottom: 10px;
}

.feature-item p {
  margin: 0;
  color: var(--muted);
  line-height: 1.7;
}

.page-shell {
  padding: 48px 0 80px;
}

.form-shell, .auth-shell {
  display: flex;
  justify-content: center;
}

.form-header {
  margin-bottom: 26px;
}

.form-header h1 {
  margin-bottom: 8px;
}

.form-header p {
  color: var(--muted);
}

.application-form, .auth-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 30px;
  width: min(900px, 100%);
  box-shadow: var(--shadow);
}

.grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
}

label {
  display: block;
  margin-bottom: 18px;
  color: var(--text);
  font-weight: 600;
}

input, select, textarea {
  width: 100%;
  margin-top: 8px;
  border: 1px solid var(--border);
  border-radius: 12px;
  background: #f9fbff;
  padding: 12px 14px;
  color: var(--text);
}

textarea {
  resize: vertical;
  min-height: 120px;
}

.form-actions {
  display: flex;
  justify-content: space-between;
  gap: 16px;
  margin-top: 10px;
  flex-wrap: wrap;
}

.auth-card {
  width: min(520px, 100%);
}

.auth-form {
  display: grid;
  gap: 10px;
}

.dashboard {
  display: grid;
  gap: 24px;
}

.dashboard-top {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  align-items: center;
}

.top-actions {
  display: flex;
  align-items: center;
  gap: 8px;
}

.compact {
  grid-template-columns: repeat(4, minmax(150px, 1fr));
}

.toolbar {
  background: white;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 16px 18px;
}

.filter-form label {
  margin-bottom: 0;
}

.table-wrap {
  background: white;
  border: 1px solid var(--border);
  border-radius: 18px;
  overflow: hidden;
}

.app-table {
  width: 100%;
  border-collapse: collapse;
}

.app-table th, .app-table td {
  padding: 16px 14px;
  border-bottom: 1px solid var(--border);
  text-align: left;
  vertical-align: top;
}

.app-table thead {
  background: #f4f8ff;
}

.status-pill {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 999px;
  padding: 6px 10px;
  font-size: 0.76rem;
  font-weight: 700;
  text-transform: capitalize;
}

.status-pending {
  background: rgba(245, 158, 11, 0.12);
  color: #b45309;
}

.status-approved {
  background: rgba(34, 197, 94, 0.12);
  color: #15803d;
}

.status-rejected {
  background: rgba(220, 38, 38, 0.12);
  color: #b91c1c;
}

.status-in_review {
  background: rgba(59, 130, 246, 0.12);
  color: #1d4ed8;
}

.inline-form {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.alert {
  padding: 12px 14px;
  border-radius: 10px;
  margin-bottom: 18px;
  font-weight: 600;
}

.alert-error {
  background: rgba(220, 38, 38, 0.08);
  border: 1px solid rgba(220, 38, 38, 0.2);
  color: #991b1b;
}

.toast {
  position: fixed;
  right: 20px;
  bottom: 20px;
  padding: 14px 18px;
  border-radius: 12px;
  color: white;
  font-weight: 700;
  box-shadow: var(--shadow);
  transform: translateY(10px);
  opacity: 0;
  transition: all 0.25s ease;
}

.toast.show {
  opacity: 1;
  transform: translateY(0);
}

.toast.success {
  background: var(--success);
}

.toast.error {
  background: var(--danger);
}

@media (max-width: 860px) {
  .hero-grid,
  .feature-grid,
  .stats,
  .grid-2,
  .compact {
    grid-template-columns: 1fr;
  }

  .dashboard-top {
    flex-direction: column;
    align-items: flex-start;
  }

  .app-table {
    display: block;
    overflow-x: auto;
  }
}
