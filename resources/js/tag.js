//jQueryを別な変数「jqOther」で定義する。
var jqOther = jQuery.noConflict(true);

jqOther(function() {
    jqOther( "#tags" ).autocomplete({
        source: suggests.map(item => ({
                    label: item.title,
                    value: item.title,
                })),
    });
});

alert(123);