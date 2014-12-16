/*************************************
15.02.2012
������: EasyPlay
��������: v0.1 - ��������������� �����/����� �� ��������� ��������

������������ �������:
&width=������ ������������������;string;400 &height=������ ������������������;string;225

�������: OnLoadWebDocument

�����: ����.com

������� ����������:
[���]{ID ������}[/���]   ������:  [vimeo]29283606[/vimeo]

��������� ���� ��� �����:
vimeo, youtube

��������� ���� ��� �����:
prostopleer, flv-mp3, wpaudioplayer

flv-mp3, wpaudioplayer - ���������� ����� � ������ ����� � � �������� {ID ������} ������������ ������ ������ �� ���� mp3

*************************************/


$width = (isset($width)) ? $width : 400;
$height = (isset($height )) ? $height : 225;

$e = &$modx->Event;
switch($e->name) {
  case 'OnLoadWebDocument':

    $content = $modx->documentObject['content'];
        
    // ���������� ����� ��������� �������� ��� ��������� �����
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
    
    // ����������� ������� ���� ������������������
    $content = str_replace(array("[+width+]", "[+height+]"), array($width, $height), $content);
    
    // ���������� ����� ��������� �������� ��� ������������ ������
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

            // ������� �����
            if ($value['tag'] = "wpaudioplayer") include_once("assets/plugins/easyplay/wpaudioplayer/wpaudioplayer.php");
            }
    }
    
    $modx->documentObject['content'] = $content;
    break;
  
  default:
    return;
    break;
    }