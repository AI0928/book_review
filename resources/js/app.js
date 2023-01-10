import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

let remevent = function() {
    suggests.forEach(function( value ) {
        console.log( value );
    });
    this.parentNode.remove();
};

let addEvent = function(tag_value){
    // 親要素の取得
    var parent = document.getElementById('tag_box');

    const label = document.createElement('label');
    const input = document.createElement('input');//新たにinputを生成
    input.type = 'button';
    input.textContent = '×';
    input.classList.add('batsu');
    input.addEventListener("click", remevent);

    const hidden = document.createElement('input');//新たにinputを生成
    hidden.setAttribute('type', 'hidden');
    hidden.setAttribute('value', tag_value);
    hidden.setAttribute('name', 'tags_array[' + tag_value + ']');


    label.appendChild(document.createTextNode(`${tag_value}`));
    label.appendChild(input);
    label.appendChild(hidden);

    // 子要素を末尾に追加
    parent.appendChild(label);

};

Alpine.start();

var jqOther = jQuery.noConflict(true);

var suggests = hand_array[0];

if (document.URL.match(/edit/)){
    var review_tag = hand_array[1];
    review_tag.forEach(function(element){
        addEvent(element['title']);
    });
}


var sources = suggests.map(item => ({
    id: item.id,
    label: item.title,
    value: item.title,
}));

jqOther(function() {
    jqOther( "#tags" ).autocomplete({
        source: sources,
    });
});


window.addEventListener('DOMContentLoaded', function(){

    // プルダウンメニューのselect要素を取得
    var tags = document.getElementById("tags");

    // イベント「change」を登録
    tags.addEventListener("change",function(){
        addEvent(tags.value);
    });
});