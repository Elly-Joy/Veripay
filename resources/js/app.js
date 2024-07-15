document.addEventListener('DOMContentLoaded', () => {
    const getAccessTokenButton = document.getElementById('getAccessToken');
    const registerURLSButton = document.getElementById('registerURLS');
    const simulateButton = document.getElementById('simulate');
    const stkPushButton = document.getElementById('stkpush');

    if (getAccessTokenButton) {
        getAccessTokenButton.addEventListener('click', (event) => {
            event.preventDefault();

            axios.post('/get-token', {})
                .then((response) => {
                    console.log(response.data);
                    document.getElementById('access_token').innerHTML = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    }

    if (registerURLSButton) {
        registerURLSButton.addEventListener('click', (event) => {
            event.preventDefault();

            axios.post('register-urls', {})
                .then((response) => {
                    const responseElement = document.getElementById('response');
                    if (response.data.ResponseDescription) {
                        responseElement.innerHTML = response.data.ResponseDescription;
                    } else {
                        responseElement.innerHTML = response.data.errorMessage;
                    }
                    console.log(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    }

    if (simulateButton) {
        simulateButton.addEventListener('click', (event) => {
            event.preventDefault();

            const requestBody = {
                amount: document.getElementById('amount').value,
                account: document.getElementById('account').value
            };

            axios.post('/simulate', requestBody)
                .then((response) => {
                    const c2bResponseElement = document.getElementById('simulate');
                    if (response.data.ResponseDescription) {
                        c2bResponseElement.innerHTML = response.data.ResponseDescription;
                    } else {
                        c2bResponseElement.innerHTML = response.data.errorMessage;
                    }
                    console.log(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    }

    if (stkPushButton) {
        stkPushButton.addEventListener('click', (event) => {
            event.preventDefault();

            const requestBody = {
                amount: document.getElementById('amount').value,
                account: document.getElementById('account').value,
                phone: document.getElementById('phone').value
            };

            axios.post('/stkpush', requestBody)
                .then((response) => {
                    const c2bResponseElement = document.getElementById('stkpush');
                    if (response.data.ResponseDescription) {
                        c2bResponseElement.innerHTML = response.data.ResponseDescription;
                    } else {
                        c2bResponseElement.innerHTML = response.data.errorMessage;
                    }
                    console.log(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    }
});
