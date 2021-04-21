Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
});
Webcam.attach('#camera');

function capturer(){
    Webcam.snap(function(dataURI){
        $(".image-tag").val(dataURI);
        document.getElementById('photo').innerHTML = '<img id="snapshot" src="'+dataURI+'"/>';
    });
}