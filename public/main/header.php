<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community | Форум предназначен для общения и помощи по вопросам связанными с Arch Linux">
<meta name="keywords" content="Arch, Linux, ArchLinux, RU, RUS, РУС, Russian, Русское, Русскоязычное, Community, Сообщество, Forum, Форум, Site, Сайт, Resources, Ресурс, Technical Support, Техподдержка">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Arch Linux - Русскоязычное сообщество - Главная страница</title>

<link rel="canonical" href="https://archlinux.com.ru"/>
<link rel="alternate" type="application/atom+xml" title="Канал - Arch Linux Русскоязычное сообщество" href="/forum/feed">     <link rel="alternate" type="application/atom+xml" title="Канал - Новые темы" href="/forum/feed/topics">
<link href="./main/main.css" rel="stylesheet">
<link href="./forum/assets/css/font-awesome.min.css?assets_version=86" rel="stylesheet">
<link href="./forum/styles/basic/theme/stylesheet.css?assets_version=86" rel="stylesheet">
<!--[if lte IE 9]>
  <link href="./styles/basic/theme/tweaks.css?assets_version=86" rel="stylesheet">
<![endif]-->
<link rel="icon" type="image/x-icon" href="./forum/styles/basic/theme/images/logo/favicon.ico" />
<link rel="shortcut icon" type="image/x-icon" href="./forum/styles/basic/theme/images/logo/favicon.ico" />
<link rel="apple-touch-icon" href="./forum/styles/basic/theme/images/logo/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="./forum/styles/basic/theme/images/logo/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="./forum/styles/basic/theme/images/logo/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="144x144" href="./forum/styles/basic/theme/images/logo/apple-touch-icon-144x144.png" />

<!-- Schema.org data -->
<meta itemprop="name"  content="Русскоязычное сообщество Arch Linux | Russian Arch Linux community">
<meta itemprop="description" name="description" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community | Форум предназначен для общения и помощи по вопросам связанными с Arch Linux">
<meta itemprop="image" name="image" content="https://archlinux.com.ru/favicon.ico">

<!-- Twitter Card data  -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@Arch_Linux_Русскоязычное_сообщество">
<meta name="twitter:title" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community">
<meta name="twitter:description" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community | Форум предназначен для общения и помощи по вопросам связанными с Arch Linux">
<meta name="twitter:creator" content="@Arch_Linux_Русскоязычное_сообщество">
<meta name="twitter:image" content="https://archlinux.com.ru/favicon.ico">

<!-- Open Graph data  -->
<meta property="og:locale" content="ru_RU">
<meta property="og:title" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://archlinux.com.ru" />
<meta property="og:image" content="https://archlinux.com.ru/favicon.ico" />
<meta property="og:description" content="Arch Linux Русскоязычное сообщество | Russian Arch Linux community | Форум предназначен для общения и помощи по вопросам связанными с Arch Linux" />
<meta property="og:site_name" content="Arch Linux Русскоязычное сообщество" />

<!-- Image for Social -->
<link rel="image_src" href="https://archlinux.com.ru/forum/styles/basic/theme/images/logo.png">

<!-- FUNCTION MAIN PAGE -->
<?php include './main/function.php';?>
<!-- INCLUDE COUNTER -->
<?php include './main/ya.php'; ?>

</head>
<body>
<a id="top" class="top-anchor" accesskey="t"></a>
  <div id="page-header" class="page-width">
    <div class="headerbar" role="banner">
      <div class="inner">
        <div id="site-description" class="site-description">
          <a id="logo" class="logo" href="https://archlinux.com.ru" title="Arch Linux - Русскоязычное сообщество - Главная страница">
          <img src="./forum/styles/basic/theme/images/logo.png" data-src-hd="./forum/styles/basic/theme/images/logo_hd.png" alt="Русскоязычное Сообщество Arch Linux"/>
          </a>
          <p class="sitename">Arch Linux - Русскоязычное сообщество</p>
          <p>Arch Linux - Русскоязычное сообщество</p>
          <p class="skiplink"><a href="#start_here">Пропустить</a></p>
      </div>
    </div>
  </div>
<div class="navbar tabbed not-static" role="navigation">
  <div class="inner page-width">
    <div class="nav-tabs" data-current-page="index">
      <ul class="leftside">
        <li id="quick-links" class="quick-links tab responsive-menu dropdown-container">
          <a href="#" class="nav-link dropdown-trigger">Быстрый доступ</a>
          <div class="dropdown">
            <div class="pointer"><div class="pointer-inner"></div></div>
            <ul class="dropdown-contents" role="menu">
            	<li class="separator"></li>
									<li>

						  <?php if(is_auth()){ ?>	
            	<a href="./forum/search.php?search_id=egosearch" role="menuitem">
									<i class="icon fa-file-o fa-fw icon-gray" aria-hidden="true"></i><span>Ваши сообщения</span>
								</a>
							</li>
											<li>
								<a href="./forum/search.php?search_id=newposts" role="menuitem">
									<i class="icon fa-file-o fa-fw icon-red" aria-hidden="true"></i><span>Новые сообщения</span>
								</a>
							</li>
											<li>
								<a href="./forum/search.php?search_id=unreadposts" role="menuitem">
									<i class="icon fa-file-o fa-fw icon-red" aria-hidden="true"></i><span>Непрочитанные сообщения</span>
								</a>
							</li>
              <?php } ?>

									<li>
								<a href="./forum/search.php?search_id=unanswered" role="menuitem">
									<i class="icon fa-file-o fa-fw icon-gray" aria-hidden="true"></i><span>Темы без ответов</span>
								</a>
							</li>
							<li>
								<a href="./forum/search.php?search_id=active_topics" role="menuitem">
									<i class="icon fa-file-o fa-fw icon-blue" aria-hidden="true"></i><span>Активные темы</span>
								</a>
							</li>
							<li class="separator"></li>
							<li>
								<a href="./forum/search.php" role="menuitem">
									<i class="icon fa-search fa-fw" aria-hidden="true"></i><span>Поиск</span>
								</a>
							</li>	
            </ul>
          </div>
        </li>
        <li class="tab home selected" data-responsive-class="small-icon icon-home">
          <a class="nav-link" href="https://archlinux.com.ru" data-navbar-reference="home">Главная</a>
        </li>
        <li class="tab forums" data-responsive-class="small-icon icon-forums">
          <a class="nav-link" href="./forum/index.php">Форум</a>
        </li>
          <li class="tab downloads members dropdown-container" data-select-match="member" data-responsive-class="small-icon icon-members">
            <a class="nav-link dropdown-trigger" href="https://archlinux.org/download/">Загрузки</a>
            <div class="dropdown">
              <div class="pointer"><div class="pointer-inner"></div></div>
              <ul class="dropdown-contents" role="menu">
                  <!-- noindex -->
                  <li>
                    <a href="https://archlinux.org/download/" role="menuitem">
                      <i class="icon fas fa-download" aria-hidden="true"></i><span>Скачать дистрибутив</span>
                    </a>
                  </li>
                  <li>
                    <a href="https://archlinux.org/packages/" role="menuitem">
                      <i class="icon fas fa-server" aria-hidden="true"></i><span>Официальный репозиторий</span>
                    </a>
                  </li>
                  <li>
                    <a href="https://aur.archlinux.org/packages/" role="menuitem">
                      <i class="icon fas fa-users" aria-hidden="true"></i><span>Пользовательский репозиторий (AUR)</span>
                    </a>
                  </li>
                <!-- /noindex -->
              </ul>
            </div>
          </li>
      </ul>
      <ul class="rightside" role="menu">
         <li class="tab wiki" data-select-match="wiki" data-responsive-class="small-icon icon-wiki">
          <a class="nav-link" href="https://wiki.archlinux.org/title/Main_page_(%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)" rel="wiki" title="wiki.archlinux.org" role="menuitem">
            <i class="icon fa fa-wikipedia-w" aria-hidden="true"></i>
          </a>
        </li>
         
        <li class="tab faq" data-select-match="faq" data-responsive-class="small-icon icon-faq">
					<a class="nav-link" href="/forum/help/faq" rel="help" title="Часто задаваемые вопросы" role="menuitem">
						<i class="icon fa-question-circle fa-fw" aria-hidden="true"></i><span>FAQ</span>
					</a>
				</li>
        <?php if(!is_auth()){ ?>
				<li class="tab login"  data-skip-responsive="true" data-select-match="login"><a class="nav-link" href="./forum/ucp.php?mode=login&amp;redirect=index.php" title="Вход" accesskey="x" role="menuitem">Вход</a></li>
				<li class="tab register" data-skip-responsive="true" data-select-match="register"><a class="nav-link" href="./forum/ucp.php?mode=register" role="menuitem">Регистрация</a></li>
        <?php }else{ ?>             
				<li id="username_logged_in" class="tab account dropdown-container" data-skip-responsive="true" data-select-match="ucp">
				  <a href="./forum/ucp.php" class="nav-link dropdown-trigger"><span style="color: #AA0000;" class="username-coloured">Пользователь</span></a>
						<div class="dropdown">
							<div class="pointer"><div class="pointer-inner"></div></div>
							<ul class="dropdown-contents" role="menu">
					    	<li>
							    <a href="./forum/ucp.php" title="Личный раздел" role="menuitem">
								  <i class="icon fa-sliders fa-fw" aria-hidden="true"></i><span>Личный раздел</span>
							    </a>
						    </li>
								<li>
								  <a href="./forum/memberlist.php?mode=viewprofile&amp;u=<?php echo $_COOKIE['phpbb3_s3ldz_u'] ?>" title="Профиль" role="menuitem">
									  <i class="icon fa-user fa-fw" aria-hidden="true"></i><span>Профиль</span>
								  </a>
							  </li>
								<li class="separator"></li>
								<li>
								  <a href="./forum/ucp.php?mode=logout&amp;sid=<?php echo $_COOKIE['phpbb3_s3ldz_sid'] ?>" title="Выход" accesskey="x" role="menuitem">
									  <i class="icon fa-power-off fa-fw" aria-hidden="true"></i><span>Выход</span>
									</a>
							</li>
            </div>
          </li>  
          <li class="tab logout"  data-skip-responsive="true"><a class="nav-link" href="./forum/ucp.php?mode=logout&amp;sid=<?php echo $_COOKIE['phpbb3_s3ldz_sid'] ?>" title="Выход" accesskey="x" role="menuitem">Выход</a></li>
        <?php } ?>
       </ul>
    </div>
  </div>
</div>
<div class="main-top-line"></div>


