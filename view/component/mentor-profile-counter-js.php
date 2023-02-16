<script>
        let counter = document.querySelectorAll(".counter");
        let arr = Array.from(counter);

        arr.map((item) => {
            let count = item.innerHTML;
            item.innerHTML = "";
            let countNumber = 0;
            function counterUp() {
                item.innerHTML = countNumber++;
                if (countNumber > count) {
                    clearInterval(stop);
                }
            }
            let stop = setInterval(() => {
                counterUp();
            }, item.dataset.speed / count);
        })

    </script>