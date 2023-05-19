<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background: rgba(229,231,232,0.92);font-family: Arial,Helvetica,sans-serif ;padding: 15px">

<div style="width: 700px;margin: 40px auto;background: #ffffff;border-radius: 10px;padding: 15px">
    <h1 style="text-align: center">حاضنة تكنولوجيا المعلومات </h1>
    <p style="text-align: center;font-size: smaller">جامعة الأزهر ، كلية الدراسات المتوسطة</p>

    <p style="text-align: center ;margin-top:20px ">
        حاضنة تكنولوجيا المعلومات تعقد دورة مكثفه لطلبة قسم الهندسة وتكنولوجيا المعلومات لمادة {{$course}}
        <br>
        تحت أشراف المدرب :   {{$name}}
        <br>
    </p>

    <p style="text-align: center ;margin-top: 30px">
        <a href="{{$url}}" style="text-decoration: none ;padding: 7px; background: blue ; text-align: center; color: white; border-radius: 7px;
   font-size: small " >أضغط لتسجيل </a>
    </p>

    <p style="text-align: center">

        نتمنا  لكم التوفيق والمزيد من النجاح في حياتك المهنية والشخصية
    </p>


    <p style="text-align: center ;margin-top:30px ; font-size: smaller">جميع الحقوق محفوضة لجامعة الازهر {{ date('Y') }}</p>

</div>
</body>
</html>
