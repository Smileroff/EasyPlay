/*************************************
15.02.2012
плагин: EasyPlay
описание: v0.1 - воспроизведение аудио/медиа со сторонних ресурсов

конфигурация плагина:
&width=Ширина видеопроигрывателя;string;400 &height=Высота видеопроигрывателя;string;225

События: OnLoadWebDocument

Автор: леха.com

Краткая инструкция:
[тег]{ID ролика}[/тег]   Пример:  [vimeo]29283606[/vimeo]

Известные теги для видео:
vimeo, youtube

Известные теги для аудио:
prostopleer, flv-mp3, wpaudioplayer

flv-mp3, wpaudioplayer - подгружают плеер с вашего сайта и в качестве {ID ролика} используется прямая ссылка на файл mp3

*************************************/


$width = (isset($width)) ? $width : 400;
$height = (isset($height )) ? $height : 225;

$e = &$modx->Event;
switch($e->name) {
  case 'OnLoadWebDocument':

    $content = $modx->documentObject['content'];
        
    // подключаем набор известных сервисов для просмотра видео
    include("assets/plugins/easyplay/library_video.php");
   
    foreach ($VideoInsertCode as $value){
        preg_match_all('/\['.$value['tag'].'\](.*?)\[\/'.$value['tag'].'\]/is', $content, $videocode);
        for ($i=0; $i < count($videocode['0']); $i++)
        {
            $mediaId =  $videocode['1'][$i];
            $replaceString = $videocode['0'][$i];
            $new = str_replace("[+mediaId+]", $mediaId, $value['code']);
            $content = str_replace($replaceString, $new, $content);
        }
    }
    
    // расставляем размеры окна видеопроигрывателя
    $content = str_replace(array("[+width+]", "[+height+]"), array($width, $height), $content);
    
    // подключаем набор известных сервисов для проигрывания музыки
    include("assets/plugins/easyplay/library_audio.php");
    
    foreach ($AudioInsertCode as $value){
        preg_match_all('/\['.$value['tag'].'\](.*?)\[\/'.$value['tag'].'\]/is', $content, $audiocode);
        for ($i=0; $i < count($audiocode['0']); $i++)
        {
            $mediaId =  $audiocode['1'][$i];
            $replaceString = $audiocode['0'][$i];
            $new = str_replace("[+mediaId+]", $mediaId, $value['code']);
            $content = str_replace($replaceString, $new, $content);
            $content = str_replace("[+pleerId+]", $i, $content);

            // костыли пошли
            if ($value['tag'] = "wpaudioplayer") include_once("assets/plugins/easyplay/wpaudioplayer/wpaudioplayer.php");
            }
    }
    
    $modx->documentObject['content'] = $content;
    break;
  
  default:
    return;
    break;
    }