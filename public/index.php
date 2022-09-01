<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebPage">
<?php include './main/header.php';?>
<div id="content">
<div id="content-left-wrapper">
  <div id="content-left">
    <?php if(!is_auth()){ ?>
    <div id="into"> 
      <p><h2>Добро пожаловать на сайт русскоязычного сообщества Arch Linux!</h2>Arch Linux™ - гибкий и простой дистрибутив, разработанный для удовлетворения нужд опытных пользователей Linux. Он является одновременно мощным и простым в управлении, что делает его идеальным дистрибутивом для серверов и рабочих станций.</p>
      <p>Развивайте систему на базе Arch в любом нужном направлении: если вы разделяете данный взгляд на то, каким должен быть дистрибутив GNU/Linux®, тогда добро пожаловать в сообщество Arch Linux!</p>
      <div align="right">
      <a href="forum/viewtopic.php?p=145#p145" class="button" title="Кодекс поведения">
        <span>Кодекс поведения</span>
      </a>
        <a href="forum/ucp.php?mode=login&redirect=ucp.php?mode=register" class="button" title="Присоединяйтесь!">
        <span>Присоединяйтесь</span>
      </a>
      </div>
    </div>
    <?php } ?>
    <div id="content-line">
      <div id="last-topic" class="main-box-left main-right">
        <h2><a href="forum/search.php?search_id=active_topics">Последние изменения на форуме:</a></h2>
        <ul>
        <?php main_get_rss("https://archlinux.com.ru/forum/feed/topics_active", "10"); ?>
        </ul>
      </div>
      <div id="news-topic" class="main-box-left">
        <h2><a href="forum/viewforum.php?f=49">Локальные новости:</a></h2>
        <ul>    
        <?php main_get_data_db('49','10'); ?>
        </ul>
      </div>
    </div> <!-- END CONTENT LINE TWO -->
    <div id="content-line">
      <div id="last-blog" class="main-box-left main-right">
        <h2><a href="forum/viewforum.php?f=50">Статьи и публикации:</a></h2>
        <ul>
        <?php main_get_data_db('50','10'); ?>
        </ul>
      </div>
      <div id="gnews-topic" class="main-box-left">
        <h2><a href="forum/viewforum.php?f=56">Глобальные новости:</a></h2>
        <ul>    
        <?php main_get_data_db('56','10'); ?>
        </ul>
      </div>
    </div> <!-- END CONTENT LINE THREE -->
  </div> 
</div> <!-- END CONTENT LEFT -->


<div id="content-right-wrapper">
  <div id="content-right">
    <div id="main-package" class="main-box-right">
    <h3><!-- noindex --><a href="https://archlinux.org/packages/?sort=-last_update" >Недавние обновления:</a><!-- /noindex --></h3>
      <ul>
        <?php include './main/bin/tmp/package.html';?>
      </ul>
    </div>
    <div id="main-links" class="main-box-right">
      <h3>Документация:</h3>
      <ul>
        <!-- noindex -->
        <li><a href="https://wiki.archlinux.org/">Arch Linux Wiki</a></li>
        <li><a href="https://man.archlinux.org/">Manual Pages</a></li>
        <li><a href="https://wiki.archlinux.org/title/Installation_guide">Installation Guide</a></li>
        <!-- /noindex -->
      </ul>
      <h3>Загрузки:</h3>
      <ul>
        <!-- noindex -->
        <li><a href="https://archlinux.org/download/">Скачать дистрибутив</a></li>
        <li><a href="https://archlinux.org/packages/">Официальный репозиторий</a></li>
        <li><a href="https://aur.archlinux.org/packages/">Пользовательский репозиторий (AUR)</a></li>
        <!-- /noindex -->
      </ul>
      <h3>Сообщество:</h3>
      <ul>
        <li><a href="forum/viewtopic.php?p=145#p145">Кодекс поведения</a></li>
      </ul>
    </div>
  </div><!--END CONTENT RIGHT -->
</div>

</div><!-- END CONTENT -->

<?php include './main/footer.php';?>
</body>
</html>
