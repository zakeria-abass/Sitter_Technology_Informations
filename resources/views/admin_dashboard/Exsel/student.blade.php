<table class="table table-bordered">
    <thead>
    <tr>
        <th>رقم الجامعي</th>
        <th>الاسم</th>
        <th>رقم الجوال</th>
        <th>التخصص</th>
        <th>جنس</th>
        <th>تاريخ التسجيل</th>
    </tr>
    </thead>
    <tbody>

    @foreach($courses->Student as $course)

        <tr>
            <td>{{$course->n_university}}</td>
            <td>{{$course->name_ar}}</td>
            <td>{{$course->phone}}</td>
            <td>{{$course->specialty}}</td>
            <td>{{$course->gender}}</td>
            <td>{{$course->created_at->format('Y-m-d')}}</td>

        </tr>

    @endforeach
    </tbody>
</table>
