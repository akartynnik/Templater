#Templater v1.1 для MantisBT
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
2. В файле `core/html_api.php` в начало функции `html_footer()` вставить строчку `event_signal( 'EVENT_TEMPLATER_INIT' );` после строки `function html_footer( $p_file = null ) {` (этот иветн отвечает за инициализацию плагина на каждой из страниц *MantisBT*);
3. В *MantisBT* в меню *"Управление"-"Управление плагинами"* включить плагин **Шаблонизатор Templater**;   

###Инструкция по установке плагина в версиях 1.3.X

1. Скопировать папки `plugins/Templater/` и `templates/` в корень *MantisBT*
2. В файле `core/html_api.php` в начало функции `html_footer()` вставить строчку `event_signal( 'EVENT_TEMPLATER_INIT' );` после строки `function html_footer() {` (этот иветн отвечает за инициализацию плагина на каждой из страниц *MantisBT*);
3. В файле `core/http_api.php` в функции `http_security_headers()` изменить строчку `header( 'Content-Security-Policy: default-src \'self\';' . $t_avatar_img_allow . '; frame-ancestors \'none\'' );` на `header( 'Content-Security-Policy: default-src \'self\'; font-src \'self\' fonts.gstatic.com; style-src \'self\' fonts.googleapis.com \'unsafe-inline\';' . $t_avatar_img_allow . '; frame-ancestors \'none\';' );` (изменения касаются так называемой [Content Security Policy](http://habrahabr.ru/company/yandex/blog/206508/), и позволяют подгружать шрифты с серверов google, а так же устраняют проблему с подгрузкой стилей, используемых библиотекой jQuery);
4. В *MantisBT* в меню *"Управление"-"Управление плагинами"* включить плагин **Шаблонизатор Templater**;   

***

Для корректной работы шаблонов семейства *DarkBlue* необходимо внести несколько правок в конфигурацию *MantisBT*:  

1. Внести правки в ваш файл конфигурации `config_inc.php` в соответствии с файлом `config_inc_custom.php` из этого репозитория; 
2. После внесения изменений в файл конфигурации идем в меню *"Управление"-"Управление конфигурацией"-"Отображаемые столбцы"* и заменяем значение в поле *"Просмотр инцидентов"* на `selection, priority, id, summary, category_id, status, eta, date_submitted, last_updated, edit`;
	
###Инструкция по созданию новых шаблонов  

1. Все новые шаблоны должны быть помещены в папку `templates`;
2. Название шаблона при отображении в Templater - это название папки шаблона;
3. В каждом шаблоне обязательно должны присутствовать файлы `css/style.css` и `js/script.js`; 

Именно в этих двух файлах содержатся все стили пользовательского шаблона. Templater на лету подключает эти файлы для конкретного шаблона и вставляет их в каждую страницу *MantisBT*;  


**TODO:** сделать английскую локализацию

**Ссылки**  
[Топик на оф. форуме MantisBT](https://www.mantisbt.org/forums/viewtopic.php?f=11&t=22909&e=0)   
[Пост на Habrahabr.ru](http://habrahabr.ru/post/249367/)  

**Контакты (Contact info)**
* skype: `lex-kar-008` 
* email: `alex.kar.008[dog]dmail.com`  

**Превью**  
***
![MantisBT Templater](http://habrastorage.org/files/abd/cb0/89b/abdcb089b9ca4aadaa63f412f8f7ad17.JPG)
***
![MantisBT DarkBlue template](http://habrastorage.org/files/56f/059/94b/56f05994bae448378d107f9dc6f87d56.JPG)
***
![MantisBT DarkRed template](http://habrastorage.org/files/819/8fa/75a/8198fa75a64546a9a21661eab0b1eeba.JPG)
***
![MantisBT DarkBlue template](http://habrastorage.org/files/c07/64c/f3f/c0764cf3f37649c99a4c84ce94f2cea8.PNG)
***
![MantisBT DarkBlue template](http://habrastorage.org/files/02a/d4c/1ae/02ad4c1ae60d4202a7135a42f72a15a7.PNG)
***
![MantisBT DarkRed template](http://habrastorage.org/files/685/4f9/199/6854f9199163442b9ac588c498c38527.JPG)

