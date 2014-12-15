iplooksup
=========
功能：输入IP，在导入的列表中找到该IP的网段。
实现：将IP转换为十进制序号--A.B.C.D=> (A)hex(B)hex(C)hex(D)hex=> ((A)hex(B)hex(C)hex(D)hex)dec
查找：根据子网掩码/结束地址段计算网段开始结束序号，在数据库查找时where ip in (begin,end)

iplooksup
