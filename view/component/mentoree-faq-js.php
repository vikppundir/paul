<script>
        let accHeading = document.querySelectorAll(".mentoree-accordion");
        let accPanel = document.querySelectorAll(".mentoree-answer");

        for (let i = 0; i < accHeading.length; i++) {
            accHeading[i].onclick = function () {
                if (this.nextElementSibling.style.maxHeight) {
                    hidePanels();
                } else {
                    showPanel(this);
                }
            };
        }
        function showPanel(elem) {
            hidePanels();
            elem.classList.add("active");
            elem.nextElementSibling.style.maxHeight = elem.nextElementSibling.scrollHeight + "px";
            elem.nextElementSibling.style.transition = "all 0.3s";
        }

        function hidePanels() {
            for (let i = 0; i < accPanel.length; i++) {
                accPanel[i].style.maxHeight = null;
                accHeading[i].classList.remove("active");
            }
        }
    </script>