$.sidebarMenu = function(menu) {
  var animationSpeed = 300;

  defactive();

  $(menu).on('click', 'li a', function(e) {
      if($(e.target).parent('a').parent('li').hasClass('active')|| $(e.target).parent('li').hasClass('active')){
          return ;
      }
    var $this = $(this);
    var checkElement = $this.next();

    if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
      checkElement.slideUp(animationSpeed, function() {
        checkElement.removeClass('menu-open');
      });
      checkElement.parent("li").removeClass("active");
    }

    //If the menu is not visible
    else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
      //Get the parent menu
      var parent = $this.parents('ul').first();
      //Close all open menus within the parent
      var ul = parent.find('ul:visible').slideUp(animationSpeed);
      //Remove the menu-open class from the parent
      ul.removeClass('menu-open');
      //Get the parent li
      var parent_li = $this.parent("li");

      //Open the target menu and add the menu-open class
      checkElement.slideDown(animationSpeed, function() {
        //Add the class active to the parent li
        checkElement.addClass('menu-open');
        parent.find('li.active').removeClass('active');
        parent_li.addClass('active');
      });
    }
    //if this isn't a link, prevent the page from being redirected
    if (checkElement.is('.treeview-menu')) {
      e.preventDefault();
    }
  });
}
function getmodel(search) {
    var re=/[\w]+\.php\?model=[\w]+/i;
    var url = search.match(re) ;
    // alert(typeof(url[0]));
    return url[0];
    // var strs;
    // if (url.indexOf("?") != -1) {    //判断是否有参数
    //     var str = url.substr(url.indexOf("?")+1); //从第一个字符开始 因为第0个是?号 获取所有除问号的所有符串
    //     strs = str.split("=");   //用等号进行分隔 （因为知道只有一个参数 所以直接用等号进分隔 如果有多个参数 要用&号分隔 再用等号进行分隔）
    //     // alert(strs[1]);
    // }
    // return strs[1];
}
function defactive() {
    var model=getmodel(window.location.href);
    var group=$("ul.treeview-menu li a");
    for(var i=0;i<group.length;i++){
        // alert(getmodel(group.eq(i).attr("href"))+'/'+model);
        if(getmodel(group.eq(i).attr("href"))==model){
                group.eq(i).parents("li").addClass("active");

          return;
        }

    }
}