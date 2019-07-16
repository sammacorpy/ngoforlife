$('document').ready(function() {

    var canvas = document.getElementById('logring');


    var wth = window.innerWidth / 2 - 20;


    window.addEventListener('resize', function() {
        wth = window.innerWidth / 2 - 20;
    });


    function logoanimation() {

        var c = canvas.getContext("2d");


        c.lineWidth = "4";

        var x = 0;
        var y = 0;


        function animate() {
            requestAnimationFrame(animate);
            c.clearRect(0, 0, canvas.width, canvas.height);


            c.beginPath();
            c.arc(canvas.width / 2, canvas.height / 2, 140, x + 0, x + 1.5 * 3.14, false);
            c.strokeStyle = "pink";
            c.stroke();

            c.beginPath();
            c.arc(canvas.width / 2, canvas.height / 2, 140 - 15, y + 3.14, y + 2.5 * 3.14, false);
            c.strokeStyle = "#ffffff";
            c.stroke();

            c.beginPath();
            c.arc(canvas.width / 2, canvas.height / 2, 140 - 30, x + 0, x + 1.5 * 3.14, false);
            c.strokeStyle = "#EB4452";
            c.stroke();

            x += 0.05;
            y -= 0.05;

            if (x > 2 * Math.PI) {
                x = 0;
            }

            if (y < -(2 * Math.PI)) {
                y = 0;
            }
        }
        animate();
    }
    logoanimation();



});