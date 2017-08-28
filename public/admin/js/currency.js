/*
@Name：不落阁后台模板源码 
@Author：wangsen
@Site：http://www.wangsenphp.cn
*/
function openurl(url,title,w="90%",h="80%")
{
    layer.open({
        title:title||'',
        type: 2,
        area: [w, h],
        skin: 'indexview',
        content: [url, 'yes'],
        scrollbar: false,
        success: function(layer, index){
            var height = jQuery("iframe").contents().find('html').height() || '';
            var width = jQuery("iframe").contents().find('html').width() || '';
            if(height && width)
            {
                layer.style(index, {
                    width: width+'px',
                    height: height+'px'
                });
            }
        }
    });
}