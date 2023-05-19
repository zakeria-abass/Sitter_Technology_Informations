
<!DOCTYPE html>
<html>
<title>Studunt</title>
<head>
    <style>
        * {
            box-sizing: border-box;
        }

        body{
            background: url("Stamp.png");
        }

        .row {
            margin-left:-5px;
            margin-right:-5px;
        }

        .column {
            float: left;
            width: 50%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 200%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>جامعة الازهر كلية الدراسات المتوسطة</h2>
<p>حاضنة تكنولوجيا المعلومات : <span style="color: red">  دورة : {{$students->name}}</span></p>


<div class="row">
    <div class="column">
        <table>
            <tr>
                <th class="wd-15p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">الرقم الجامعي</th>
                <th class="wd-15p border-bottom-0">اسم الطالب</th>
                <th class="wd-20p border-bottom-0">التخصص الجامعي</th>
                <th class="wd-20p border-bottom-0"> المرحلة العلمية</th>
                <th class="wd-15p border-bottom-0"> الكورس</th>
            </tr>

            <?php $i=1 ?>
            @foreach($students->student as $itam)
                <tr>
                    <td>{{$i ++}}</td>
                    <td>
                        {{$itam->n_university}}
                    </td>
                    <td>{{$itam->name}}</td>
                    <td>{{$itam->specialty}}</td>
                    <td>{{$itam->stage}}</td>
                    <td class="text-danger">{{$students->name}}</td>


            @endforeach
        </table>
    </div>
</div>

</body>
</html>
