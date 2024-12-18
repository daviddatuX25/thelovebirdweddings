<script>
document.addEventListener("DOMContentLoaded", () => {
    const errorMessage = document.getElementById("error-message");

    if (errorMessage) {
        // Show the error message
        errorMessage.classList.add("show");

        // Auto-hide after 3 seconds
        setTimeout(() => {
            errorMessage.classList.remove("show");
        }, 3000);
    }
});
</script>
</body>
</html>
