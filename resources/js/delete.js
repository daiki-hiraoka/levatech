function dialogDelete(){
    'use strict';
    const post = @json($post);
    if(window.confirm('削除したら復元出来ません。\n本当に削除しますか？')) {
        return true;
    } else {
        alert('キャンセルされました。');
        return false;
    }
}