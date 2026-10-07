# Hostel Login QA Report (Newman)

**Run date:** 2026-06-30  
**Target:** `http://localhost:8080/login.php` (PHP built-in server)  
**Runner:** Newman v6 + Postman Collection  
**Collection:** `qa-tests/hostel-login.postman_collection.json`

---

## Executive Summary

| Metric | Value |
|--------|-------|
| Total requests | 22 |
| Total assertions | 44 |
| **Passed** | **42** |
| **Failed** | **2** |
| Pass rate | 95.5% |
| Run duration | 2.2s |

---

## Test Results by Category

### 1. Page Load & UI — **PASS (9/9)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| UI-01 | Page loads | ✅ Pass | HTTP 200, form fields and Login button present |
| UI-02 | Stylesheet linked | ✅ Pass | `style.css` and `login-container` present |
| UI-03 | Register link | ✅ Pass | Links to `register.php` |
| UI-04 | Back To Home link | ✅ Pass | Links to `index.php` |
| UI-05 | Password masked | ✅ Pass | Input type is `password` |

### 2. Failed Login — **PARTIAL (5/6)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| NEG-01 | Wrong password | ✅ Pass | Redirects to `login.php?error=User+not+found` |
| NEG-02 | Wrong username | ✅ Pass | Same error redirect |
| NEG-04 | Error message visible | ❌ **Fail** | URL contains error param but **page does not display any error message** |

**Defect:** `loginprocess.php` sends errors via query string, but `login.php` never reads or renders `$_GET['error']`.

### 3. Server Validation — **PASS (5/5)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| SRV-01 | Empty username POST | ✅ Pass | Redirects to `login.php?error=Enter+Username` |
| SRV-02 | Empty password POST | ✅ Pass | Redirects to `login.php?error=Enter+Password` |
| SRV-03 | GET loginprocess.php | ✅ Pass | Returns 200, no server crash |

### 4. Authentication & Session — **PASS (16/16)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| AUTH-01 | Valid regular user login | ✅ Pass | Redirects to `index.php`, `PHPSESSID` cookie set |
| AUTH-03 | Already logged in → login.php | ✅ Pass | Redirects to `index.php` |
| AUTH-04 | Navbar shows logout | ✅ Pass | Logout link and username visible in navbar |
| SES-01 | Logout clears session | ✅ Pass | Redirects after logout |
| SES-02 | Login page after logout | ✅ Pass | Form accessible, no redirect |
| SES-02b | Re-login after logout | ✅ Pass | Successful login again |
| SES-03 | Myaccount when logged out | ✅ Pass | Redirects to `login.php` |

### 5. Admin Login — **PARTIAL (2/3)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| AUTH-02 | Valid admin login | ❌ **Fail** | Redirects to `addroom.php` but file returns **404** (actual file is at `admin/addroom.php`) |

**Defect:** Wrong redirect path for admin users in `loginprocess.php` line 28.

### 6. Security Observations — **PASS (2/2)**

| ID | Test Case | Status | Notes |
|----|-----------|--------|-------|
| SEC-01 | SQL injection attempt | ✅ Pass | Injection rejected; no redirect to `index.php` |

**Note:** Rejection is due to no matching row, not parameterized queries. SQL injection risk remains (string concatenation in query).

---

## Confirmed Defects

| Severity | ID | Description | Location |
|----------|-----|-------------|----------|
| **Major** | NEG-04 | Error messages not shown on login page | `login.php` |
| **Critical** | AUTH-02 | Admin redirect to non-existent `addroom.php` (404) | `loginprocess.php:28` |
| **Minor** | — | Extra stray `</p>` tag in HTML | `login.php:34` |
| **Info** | SEC-01 | Passwords stored/compared in plain text; SQL built via concatenation | `loginprocess.php`, `registerprocess.php` |

---

## Newman Artifacts

| File | Description |
|------|-------------|
| `qa-tests/reports/newman-report.html` | HTML report (open in browser) |
| `qa-tests/reports/newman-junit.xml` | JUnit XML for CI |
| `qa-tests/reports/newman-cli-output.txt` | Full CLI console output |
| `qa-tests/hostel-login.postman_collection.json` | Postman/Newman collection |
| `qa-tests/hostel-login.postman_environment.json` | Environment variables |

---

## How to Re-run

```powershell
# Terminal 1 — start PHP server (if not using XAMPP Apache)
Set-Location c:\xampp\htdocs\hostel
C:\xampp\php\php.exe -S localhost:8080 -t .

# Terminal 2 — setup DB + run tests
Set-Location c:\xampp\htdocs\hostel\qa-tests
npm run setup
npm run test:login
```

---

## Newman CLI Summary

```
┌─────────────────────────┬──────────────────┬──────────────────┐
│                         │         executed │           failed │
├─────────────────────────┼──────────────────┼──────────────────┤
│              iterations │                1 │                0 │
│                requests │               22 │                0 │
│            test-scripts │               21 │                0 │
│              assertions │               44 │                2 │
└─────────────────────────┴──────────────────┴──────────────────┘

Failures:
 1. NEG-04 — Error message not displayed on login page
 2. AUTH-02 — addroom.php returns 404
```

---

*Generated by Newman automated QA run.*
