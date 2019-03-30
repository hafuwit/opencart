cd /D "%~dp0"

RD /S /Q "..\..\upload\admin\controller\extension\hfwmodule"


RD /S /Q "..\..\upload\admin\model\extension\hfwmodule"


RD /S /Q "..\..\upload\admin\view\template\extension\hfwmodule"
RD /S /Q "..\..\upload\admin\view\image\hfwmodule"
RD /S /Q "..\..\upload\admin\view\stylesheet\hfwmodule"
RD /S /Q "..\..\upload\admin\view\javascript\hfwmodule"

RD /S /Q "..\..\upload\system\library\hfwmodule"



RD /S /Q "..\..\upload\admin\language\en-gb\extension\hfwmodule"
RD /S /Q "..\..\upload\admin\language\pl-PL\extension\hfwmodule"

RD /S /Q "..\..\upload\catalog\view\theme\default\image\hfwmodule"
RD /S /Q "..\..\upload\catalog\view\theme\default\stylesheet\hfwmodule"
RD /S /Q "..\..\upload\catalog\language\en-gb\extension\hfwmodule"
RD /S /Q "..\..\upload\catalog\language\pl-PL\extension\hfwmodule"


mklink /J "..\..\upload\admin\controller\extension\hfwmodule" "upload\admin\controller\extension\hfwmodule"


mklink /J "..\..\upload\admin\model\extension\hfwmodule" "upload\admin\model\extension\hfwmodule"


mklink /J "..\..\upload\admin\view\template\extension\hfwmodule" "upload\admin\view\template\extension\hfwmodule"


mklink /J "..\..\upload\admin\view\image\hfwmodule" "upload\admin\view\image\hfwmodule"
mklink /J "..\..\upload\admin\view\stylesheet\hfwmodule" "upload\admin\view\stylesheet\hfwmodule"
mklink /J "..\..\upload\admin\view\javascript\hfwmodule" "upload\admin\view\javascript\hfwmodule"

mklink /J "..\..\upload\system\library\hfwmodule" "upload\system\library\hfwmodule"


mklink /J "..\..\upload\admin\language\en-gb\extension\hfwmodule" "upload\admin\language\en-gb\extension\hfwmodule"
mklink /J "..\..\upload\admin\language\pl-PL\extension\hfwmodule" "upload\admin\language\pl-PL\extension\hfwmodule"

mklink /J "..\..\upload\catalog\view\theme\default\image\hfwmodule" "upload\catalog\view\theme\default\image\hfwmodule"
mklink /J "..\..\upload\catalog\view\theme\default\stylesheet\hfwmodule" "upload\catalog\view\theme\default\stylesheet\hfwmodule"

mklink /J "..\..\upload\catalog\language\en-gb\extension\hfwmodule" "upload\catalog\language\en-gb\extension\hfwmodule"
mklink /J "..\..\upload\catalog\language\pl-PL\extension\hfwmodule" "upload\catalog\language\pl-PL\extension\hfwmodule"

mklink /J "..\..\upload\catalog\controller\extension\hfwmodule" "upload\catalog\controller\extension\hfwmodule"



copy "upload\admin\controller\extension\module\hfwmodule" "..\..\upload\admin\controller\extension\module\hfwmodule.php" 
copy "upload\admin\controller\extension\module" "..\..\upload\admin\controller\extension\module\hfwmodule.php" 

copy "upload\admin\model\extension\module" "..\..\upload\admin\model\extension\module\hfwmodule.php" 
copy "upload\admin\model\extension\module" "..\..\upload\admin\model\extension\module\hfwmodule.php" 


copy "upload\admin\view\template\extension\module" "..\..\upload\admin\view\template\extension\module\hfwmodule.twig" 
copy "upload\admin\view\template\extension\shipping" "..\..\upload\admin\view\template\extension\shipping\hfwsample.twig" 

copy "upload\admin\language\en-gb\extension\module" "..\..\upload\admin\language\en-gb\extension\module\hfwmodule.php" 
copy "upload\admin\language\en-gb\extension\shipping" "..\..\upload\admin\language\en-gb\extension\shipping\hfwsample.php" 


copy "upload\catalog\model\extension\shipping" "..\..\upload\catalog\model\extension\shipping\hfwsample.php" 
copy "upload\catalog\view\theme\default\template\extension\shipping" "..\..\upload\catalog\view\theme\default\template\extension\shipping\hfwsample.twig" 

copy "upload\admin\language\en-gb\extension\shipping" "..\..\upload\admin\language\en-gb\extension\shipping\hfwsample.php" 

copy "upload\admin\language\pl-PL\common" "..\..\upload\admin\language\pl-PL\common\column_left.php" 



