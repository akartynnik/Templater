#Templater v1.3 для MantisBT
Templater - это плагин, позволяющий применять к MantisBT пользовательские шаблоны оформления, а так же использовать некоторые твики.  
Список твиков в текущей версии (работают в версиях mantisbt 1.2.X и 1.3.X):  
* Возможность применять шаблоны (о написании шаблонов речь пойдет далее);  
* Возможность подключить к MantisBT jQuery v1.11.2 (необходимо для многих шаблонов и твиков);
* Возможность отправлять комментарии по нажатию "Ctrl" + "Enter";
* Возможность скрыть лого в подвале;
* Возможность убрать квадратные скобки (брекеты) вокруг ссылок;
* Превращение названия инцидента в ссылку;
* В версиях MantisBT >= 1.3.0 устранен баг с некоректной работой стилей jQuery и как следствие некоректной работой firebug у разработчиков с FireFox на борту.

Список шаблонов для MantisBT версий *1.2.X*:  
* **DarkBlue** - основной шаблон в темно-голубых тонах;  
* **DarkRed** - шаблон в темно-красных тонах, основан на DarkBlue;  
Шаблоны протестированы в **IE 11**, **FF 35.0.1**, **Vivaldi 1.0**, **Chrome 40.0**

Список шаблонов для MantisBT версий *1.3.X*:  
* **DarkBlue-1.3.X** - основной шаблон в темно-голубых тонах;  
Шаблон протестирован в **FF 35.0.1**, **Chrome 40.0**

Некоторые фишки шаблонов:  
* Выделение текущего меню;  
* Приятный web-шрифт *Open Sans*;
* Частичная замена стандартной графики;
* Исправление ряда багов верстки стандартного шаблона версий 1.2.Х;
* Полностью переделанная страница входа;
* Более удобочитаемое представление текста.


В текущей версии присутствует только **русский язык**.   
Плагин протестирован в mantisbt версий **1.2.17**, **1.2.18**, **1.2.19**, **1.3.0-beta.1**.


###Инструкция по установке плагина в версиях 1.2.X

1. Скопировать папки `plugins/Templater/` и `templates/` в корень *MantisBT*
2. В файле `core/html_api.php` в  функции `html_head_end()` перед `echo '</head>', "\n";` вставить строчку `event_signal( 'EVENT_TEMPLATER_INIT' );` (этот иветн отвечает за инициализацию плагина на каждой из страниц *MantisBT*);
3. В файлах `bug_actiongroup_add_note_inc.php`, `bugnote_add.php`, `bug_update.php` после строки `$f_bugnote_text = gpc_get_string( 'bugnote_text' );` или `$f_bugnote_text = gpc_get_string( 'bugnote_text','' );` вставить код: `if(config_get( 'plugin_Templater_add_tinymce' , null, null, null) == 1  ){$f_bugnote_text = preg_replace( "/\r|\n/", "", $f_bugnote_text);}`;
4. В файле `bug_report.php` после строки `$t_bug_data->description = gpc_get_string( 'description' );` вставить код: `if( config_get( 'plugin_Templater_add_tinymce' , null, null, null) == 1  ){$t_bug_data->description = preg_replace( "/\r|\n/", "", $t_bug_data->description);}`;
5. В *MantisBT* в меню *"Управление"-"Управление плагинами"* включить плагин **Шаблонизатор Templater**;   

###Инструкция по установке плагина в версиях 1.3.X

1. Скопировать папки `plugins/Templater/` и `templates/` в корень *MantisBT*
2. В файле `core/html_api.php` в  функции `html_head_end()` перед `echo '</head>', "\n";` вставить строчку `event_signal( 'EVENT_TEMPLATER_INIT' );` (этот иветн отвечает за инициализацию плагина на каждой из страниц *MantisBT*);
3. В файле `core/http_api.php` в функции `http_security_headers()` изменить строчку `header( 'Content-Security-Policy: default-src \'self\';' . $t_avatar_img_allow . '; frame-ancestors \'none\'' );` на `header( 'Content-Security-Policy: default-src \'self\'; font-src \'self\' fonts.gstatic.com; style-src \'self\' fonts.googleapis.com \'unsafe-inline\';' . $t_avatar_img_allow . '; frame-ancestors \'none\';' );` (изменения касаются так называемой [Content Security Policy](http://habrahabr.ru/company/yandex/blog/206508/), и позволяют подгружать шрифты с серверов google, а так же устраняют проблему с подгрузкой стилей, используемых библиотекой jQuery);
4. Проделать действия 3 и 4 из инстроукции по установке версии 1.2.Х
5. В *MantisBT* в меню *"Управление"-"Управление плагинами"* включить плагин **Шаблонизатор Templater**;   

***

Для корректной работы шаблонов семейства *DarkBlue* необходимо внести несколько правок в конфигурацию *MantisBT*:  

1. Внести правки в ваш файл конфигурации `config_inc.php` в соответствии с файлом `config_inc_custom.php` из этого репозитория; 
2. После внесения изменений в файл конфигурации идем в меню *"Управление"-"Управление конфигурацией"-"Отображаемые столбцы"* и заменяем значение в поле *"Просмотр инцидентов"* на `selection, priority, id, summary, category_id, status, eta, date_submitted, last_updated, edit`;
	
###Инструкция по созданию новых шаблонов  

1. Все новые шаблоны должны быть помещены в папку `templates`;
2. Название шаблона при отображении в Templater - это название папки шаблона;
3. В каждом шаблоне обязательно должны присутствовать файлы `css/style.css` и `js/script.js`; 

Именно в этих двух файлах содержатся все стили пользовательского шаблона. Templater на лету подключает эти файлы для конкретного шаблона и вставляет их в каждую страницу *MantisBT*;  


**TODO:** сделать английскую локализацию.

**Ссылки**  
[Топик на оф. форуме MantisBT](https://www.mantisbt.org/forums/viewtopic.php?f=11&t=22909&e=0)   
[Пост на Habrahabr.ru](http://habrahabr.ru/post/249367/)  

**Контакты (Contact info)**
* skype: `lex-kar-008` 
* email: `alex.kar.008[dog]dmail.com`  

**Превью**  
***
![Templater configuration | DarkBlue template](http://habrastorage.org/files/bab/28d/3ac/bab28d3ac5344d6e921d4adaf0e45a58.JPG)
***
![Templater configuration | DarkRed template](http://habrastorage.org/files/f64/a22/1b7/f64a221b7ed64a3e9fd297c31957c87f.JPG)
***
![Login page | DarkBlue template](http://habrastorage.org/files/876/355/d67/876355d6729b4e9e86f97b1c286db42b.JPG)
***
![Login page | DarkRed template](http://habrastorage.org/files/29d/7c1/9f3/29d7c19f3d5041a897d128ec87521785.JPG)
***
![Issue create | DarkBlue template](http://habrastorage.org/files/430/e4b/378/430e4b378cf0480682507c15f1d8f006.JPG)
***
![Issue create | DarkRed template](http://habrastorage.org/files/90b/ed6/6be/90bed66be36243b08fd0b6a3fe850db4.JPG)
***
![Issues view | DarkBlue template](http://habrastorage.org/files/3ca/7bc/978/3ca7bc97857844898901e1567d5c278c.JPG)
***
![Issues view | DarkRed template](http://habrastorage.org/files/5fd/372/e8a/5fd372e8a28d4e709fed9f520fedc51b.JPG)
