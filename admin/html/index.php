<!--从控制器判断登录 未登录转向登录页 -->

<!--后台管理首页-->

<header>
    <nav>
        <h1 class="pull-left"><strong>荣达驾校信息管理系统</strong></h1>
        <ul>
            <li>
                <img src="#" alt="头像">
            </li>
            <li>{# user.role #}:{# user.name #}</li>
            <li>
                <a href="loginout.php?user.id={# user.id #}">登出</a>
            </li>
        </ul>
    </nav>
</header>
<div>管理模块区
    <ul>
        <li>1</li>
        <li>1</li>
        <li>1</li>
        <li>1</li>
        <li>1</li>
    </ul>
</div>

<div>
    <div>模块内容区</div>
    <div>模块主体区</div>
</div>