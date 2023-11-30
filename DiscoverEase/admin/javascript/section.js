var button1 = document.getElementById("button1");
var button2 = document.getElementById("button2");
var button3 = document.getElementById("button3");
var button4 = document.getElementById("button4");
var nav = document.getElementById('nav');

button1.addEventListener('click', function() {
    resetButtonBorders();
    button1.style.borderTop = '1px solid black';
    button1.style.borderRight = '1px solid black';
    button1.style.borderLeft = '1px solid black';
    setIframeZIndex(1);
    nav.style.zIndex(1);
});

button2.addEventListener('click', function() {
    resetButtonBorders();
    button2.style.borderTop = '1px solid black';
    button2.style.borderRight = '1px solid black';
    button2.style.borderLeft = '1px solid black';
    setIframeZIndex(2);
    nav.style.zIndex(1);
});

button3.addEventListener('click', function() {
    resetButtonBorders();
    button3.style.borderTop = '1px solid black';
    button3.style.borderRight = '1px solid black';
    button3.style.borderLeft = '1px solid black';
    setIframeZIndex(3);
    nav.style.zIndex(1);
});

button4.addEventListener('click', function() {
    resetButtonBorders();
    button4.style.borderTop = '1px solid black';
    button4.style.borderRight = '1px solid black';
    button4.style.borderLeft = '1px solid black';
    setIframeZIndex(4);
    nav.style.zIndex(1);
});


function resetButtonBorders() {
    button1.style.border = 'none';
    button2.style.border = 'none';
    button3.style.border = 'none';
    button4.style.border = 'none';
}

function setIframeZIndex(zIndex) {
    for (let i = 1; i <= 4; i++) {
        const iframe = document.getElementById(`iframe${i}`);
        iframe.style.zIndex = 0;
    }
    const selectedIframe = document.getElementById(`iframe${zIndex}`);
    selectedIframe.style.zIndex = 1;
}
