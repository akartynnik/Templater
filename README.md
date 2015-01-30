#Templater v1.0 для MantisBT
Templater - это плагин, позволяющий применять к MantisBT пользовательские шаблоны оформления, а так же использовать некоторые твики.  
Список твиков в текущей версии:  
* Возможность применять шаблоны (о написании шаблонов речь пойдет далее);  
* Возможность подключить к MantisBT jQuery v1.11.2 (необходимо для многих шаблонов и твиков);
* Возможность отправлять комментарии по нажатию "Ctrl" + "Enter";
* Возможность скрыть лого в подвале;
* Возможность убрать квадратные скобки (брекеты) вокруг ссылок;
* Превращение названия инцидента в ссылку на инцидент на странице просмотра списка инцидентов;

В текущей версии присутствует лишь русский язык.   
Плагин протестирован в mantisbt v 1.2.19  


###Инструкция по установке плагина  

1. скопировать папки `plugins/Templater/` и `templates/` в корень MantisBT
2. в файле "core/html_api.php" в начало функции "html_footer()" (после текста "function html_footer( $p_file = null ) {") вставить строчку "event_signal( 'EVENT_TEMPATER_INIT' );". Этот иветн отвечает за инициализацию плагина на каждой из страниц MantisBT
3. в MantisBT в меню "Управление"-"Управление плагинами" включить плагин "Шаблонизатор Templater"  

На корректной работы шаблона DarkBlue необходимо всети несколько правок в конфигурацию MantisBT:
1. В MantisBT в меню "Управление"-"Управление конфигурацией"-"Отображаемые столбцы" заменить значение в поле "Просмотр инцидентов" на "selection, priority, id, summary, category_id, status, eta, date_submitted, last_updated, edit";
2. Внести правки в ваш файл конфигурации config_inc.php в соответствии с файлом config_inc_custom.php;  
	
###Инструкция по созданию новых шаблонов  

1. Все новые шаблоны должны быть помещены в папку "templates";
2. Название шаблона при отображении в Templater'е = название папки шаблона;
3. В каждом шаблоне обязательно должны присутствовать файлы "css/style.css" и "js/script.js"; 

Именно в этих двух файлах содержатся все стили пользовательского шаблона. Templater автоматически "подхватывает" эти два файла для выбраного шаблона и всиавляет их в каждую страницу MantisBT;  

**NOTE:** *config_inc.php.custom* file should be merged with your configuration file! Other files need to be replaced.

**TODO:** make plugin with a variety of settings and the ability to switch to the default template

**Links**  
[Official topic on MantisBT forum](https://www.mantisbt.org/forums/viewtopic.php?f=11&t=22780)  
[Post on Habrahabr.ru](http://habrahabr.ru/post/235017/)

**Images**  
![MantisBT Dark-Blue template](http://habrastorage.org/files/c51/bce/93a/c51bce93a2e64a01b531211deb8d560b.PNG)
![MantisBT Dark-Blue template](http://habrastorage.org/files/c07/64c/f3f/c0764cf3f37649c99a4c84ce94f2cea8.PNG)
![MantisBT Dark-Blue template](http://habrastorage.org/files/02a/d4c/1ae/02ad4c1ae60d4202a7135a42f72a15a7.PNG)

