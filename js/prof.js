var hamburger = document.getElementById('Hamburger');
var header_nav = document.getElementById('Header-Nav');
hamburger.addEventListener('click', function () {
    header_nav.classList.toggle("active");
});

if (window.matchMedia('(max-width: 768px)').matches) {
    //スマホ処理
    //window.alert('スマホ');
    document.getElementById('desjs1').innerText='リンクをタップすると遊べます！\nリンクが表示されていないものは画像をタップしてください。';
    document.getElementById('desjs2').textContent='リンクをタップすると遊べます！';

    $(function(){
        $('a.jsWork').click(function(){
            return false;
        })
    });
} else if (window.matchMedia('(min-width:769px)').matches) {
    //PC処理
    //window.alert('PC');
    document.getElementById('desjs1').textContent='画像をクリックすると遊べます！';
    document.getElementById('desjs2').textContent='画像をクリックすると遊べます！';
    $('.js_link').remove();
}

