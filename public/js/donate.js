// Amount selection
document.querySelectorAll('.amount-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('custom-amount').value = btn.getAttribute('data-amount');
        updateDonationAmount();
    });
});

// Custom amount input
document.getElementById('custom-amount').addEventListener('input', () => {
    document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
    updateDonationAmount();
});

function updateDonationAmount() {
    const amount = document.getElementById('custom-amount').value;
    document.getElementById('donation-amount').textContent = amount || '0';
}

// Frequency toggle
document.querySelectorAll('.freq-option').forEach(opt => {
    opt.addEventListener('click', () => {
        document.querySelectorAll('.freq-option').forEach(o => o.classList.remove('active'));
        opt.classList.add('active');
    });
});

// Payment method selection
document.querySelectorAll('.payment-method').forEach(pm => {
    pm.addEventListener('click', () => {
        document.querySelectorAll('.payment-method').forEach(p => p.classList.remove('active'));
        pm.classList.add('active');

        // Show/hide bank details
        const bankDetails = document.getElementById('bank-details');
        if (pm.querySelector('input').value === 'bank_transfer') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    });
});

// Initialize
updateDonationAmount();
document.getElementById('bank-details').style.display = 'none';

