const plans = document.getElementsByName('sponsor');
const paymentForm = document.querySelector('#dropin-container');
const submitButtonContainer = document.querySelector('.container-button-pay');
const submitButton = document.querySelector('#submit-payment-button');

plans.forEach(plan => {
    plan.addEventListener('click', function () {
        if (paymentForm) {
            paymentForm.style.display = 'block';
            submitButtonContainer.style.display = 'flex';
        }
    });
});

if (submitButton) {
    braintree.dropin.create({
        authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
        container: paymentForm
    }, function (createErr, instance) {
        submitButton.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                $.get({ payload }, function (response) {
                    if (response.success) {
                        alert('Payment successfull!');
                    } else {
                        alert('Payment failed');
                    }
                }, 'json');
                console.log(err);
            });
        });
    });
}