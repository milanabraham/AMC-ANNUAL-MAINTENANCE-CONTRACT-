function showUserDetails() {
    document.getElementById('step-plan').style.display = 'none';
    document.getElementById('step-details').style.display = 'block';
    document.getElementById('step-summary').style.display = 'none';
}

function showPlanSelection() {
    document.getElementById('step-plan').style.display = 'block';
    document.getElementById('step-details').style.display = 'none';
    document.getElementById('step-summary').style.display = 'none';
}

function showOrderSummary() {
    document.getElementById('step-plan').style.display = 'none';
    document.getElementById('step-details').style.display = 'none';
    document.getElementById('step-summary').style.display = 'block';
}
