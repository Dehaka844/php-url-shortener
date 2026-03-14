document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('shorten-form');
    const urlInput = document.getElementById('url-input');
    const resultContainer = document.getElementById('result-container');
    const shortUrlOutput = document.getElementById('short-url-output');
    const errorMessage = document.getElementById('error-message');
    const copyBtn = document.getElementById('copy-btn');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Resetear estados
        errorMessage.classList.add('hidden');
        resultContainer.classList.add('hidden');

        const longUrl = urlInput.value.trim();

        try {
            const formData = new FormData();
            formData.append('url', longUrl);

            const response = await fetch('shorten.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'success') {
                shortUrlOutput.value = data.short_url;
                resultContainer.classList.remove('hidden');
                urlInput.value = '';
            } else {
                showError(data.message);
            }
        } catch (error) {
            showError('Ocurrió un error al procesar la solicitud.');
        }
    });

    copyBtn.addEventListener('click', () => {
        shortUrlOutput.select();
        document.execCommand('copy');
        copyBtn.textContent = '¡Copiado!';
        setTimeout(() => { copyBtn.textContent = 'Copiar'; }, 2000);
    });

    function showError(msg) {
        errorMessage.textContent = msg;
        errorMessage.classList.remove('hidden');
    }
});
