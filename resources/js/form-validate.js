export function isValidEmail(value) {
    if (!value) return false;
    value = value.trim();
    // simple allowed chars: letters, digits, @ . - _ +
    const allowed = /^[A-Za-z0-9@._+\-]+$/;
    if (!allowed.test(value)) return false;
    // must contain exactly one @ and at least one dot after @
    const parts = value.split('@');
    if (parts.length !== 2) return false;
    if (parts[1].indexOf('.') === -1) return false;
    return true;
}

export function isValidPassword(value) {
    if (!value) return false;
    // at least 6 chars and at least one digit
    if (value.length < 6) return false;
    return /\d/.test(value);
}

export function isValidName(value) {
    if (!value) return false;
    value = value.trim();
    // allow letters, spaces, hyphen, and basic diacritics (simple approach)
    const allowed = /^[A-Za-zÀ-ž0-9 '\-]{2,50}$/;
    return allowed.test(value);
}

function showError(input, message) {
    clearError(input);
    const el = document.createElement('div');
    el.className = 'fv-error text-red-400 text-sm mt-1';
    el.textContent = message;
    input.classList.add('border-red-400');
    input.parentNode.appendChild(el);
}

function clearError(input) {
    input.classList.remove('border-red-400');
    const existing = input.parentNode.querySelector('.fv-error');
    if (existing) existing.remove();
}

export function attachSimpleValidation(formSelector) {
    const form = document.querySelector(formSelector);
    if (!form) return;

    const name = form.querySelector('input[name="name"]');
    const email = form.querySelector('input[name="email"]');
    const password = form.querySelector('input[name="password"]');
    const passwordConfirm = form.querySelector('input[name="password_confirmation"]');

    function validateNameField() {
        if (!name) return true;
        clearError(name);
        if (!isValidName(name.value)) {
            showError(name, 'Neplatné meno (minimálne 2 znaky, povolené písmená a medzery)');
            return false;
        }
        return true;
    }

    function validateEmailField() {
        if (!email) return true;
        clearError(email);
        if (!isValidEmail(email.value)) {
            showError(email, 'Neplatný email (musí obsahovať @ a iba povolené znaky)');
            return false;
        }
        return true;
    }

    function validatePasswordField() {
        if (!password) return true;
        clearError(password);
        if (!isValidPassword(password.value)) {
            showError(password, 'Heslo musí mať aspoň 6 znakov a obsahovať aspoň jednu číslicu');
            return false;
        }
        return true;
    }

    function validatePasswordConfirmField() {
        if (!passwordConfirm) return true;
        clearError(passwordConfirm);
        if (!password) return true;
        if (password.value !== passwordConfirm.value) {
            showError(passwordConfirm, 'Heslá sa nezhodujú');
            return false;
        }
        return true;
    }

    if (name) name.addEventListener('input', validateNameField);
    if (email) email.addEventListener('input', validateEmailField);
    if (password) password.addEventListener('input', () => { validatePasswordField(); validatePasswordConfirmField(); });
    if (passwordConfirm) passwordConfirm.addEventListener('input', validatePasswordConfirmField);


}

// Auto attach on DOMContentLoaded for common selectors
if (typeof window !== 'undefined') {
    document.addEventListener('DOMContentLoaded', () => {
        attachSimpleValidation('form');
    });

    // Expose a small API for manual attachment
    window.FormValidate = window.FormValidate || {};
    window.FormValidate.attachValidation = attachSimpleValidation;
    window.FormValidate.isValidEmail = isValidEmail;
    window.FormValidate.isValidPassword = isValidPassword;
    window.FormValidate.isValidName = isValidName;
}
