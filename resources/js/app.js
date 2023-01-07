import './bootstrap';



var jqOther = jQuery.noConflict(true);

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
        hidden.setAttribute('value', tags.value);
        hidden.setAttribute('name', 'tags_array[' + tags.value + ']');

        
        label.appendChild(document.createTextNode(`${tags.value}`));
        label.appendChild(input);
        label.appendChild(hidden);

        // 子要素を末尾に追加
        parent.appendChild(label);
        
    });
});

let remevent = function() {
    suggests.forEach(function( value ) {
        console.log( value );
    });
    this.parentNode.remove();
};

