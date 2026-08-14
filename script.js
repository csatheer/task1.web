document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".toggle-btn");

    buttons.forEach(button => {
        button.addEventListener("click", async () => {
            const id = button.dataset.id;
            button.disabled = true;

            try {
                const response = await fetch("toggle.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: new URLSearchParams({ id })
                });

                const data = await response.json();

                if (data.success) {
                    const row = document.getElementById(`row-${id}`);
                    row.querySelector(".status").textContent = data.status;
                } else {
                    alert(data.message || "Could not update status.");
                }
            } catch (error) {
                alert("Connection error. Please try again.");
            } finally {
                button.disabled = false;
            }
        });
    });
});
