<!DOCTYPE html>
<html>

<head>
    <title>Reply mail</title>
</head>

<body>

    <p> Mr. {{ $enquiries['name'] }} Made on in your greatjobsindia.com in Please find the details below of Mr.
        {{ $enquiries['name'] }} enquired </p><br>

    <h4 style="margin-top: 10px; letter-spacing: 1px; border-radius: 4px; padding: 10px; font-size: 18px; background-color: rgb(216, 216, 216); color: rgb(38, 38, 38);"
        data-ogsc="rgb(255, 255, 255)" data-ogsb="rgb(40, 40, 40)">Enquiry From  {{ $enquiries->name}} <br></h4>

    <h1 style="text-transform: uppercase; color: rgb(219, 47, 70);" data-ogsc="rgb(255, 83, 97)">
        <p>DMW</p><br><br>
    </h1>

    <table style="width: 100.0%;border: 1.0px solid rgb(204,204,204);padding: 7.0px;margin: 1.0em 0.0px;">
        <tbody>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Name<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->name }}<br></td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">E-mail<br></td>
                <td style="text-indent: 20.0px;">
                    <a href="" target="_blank" style="color: rgb(201, 136, 255) !important;"
                        data-ogsc="rgb(0, 0, 238)">{{ $enquiries->email }}</a><br>
                </td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Phone Number<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->mobile }}<br></td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Address<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->address }}<br></td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Years Of Experience<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->yoe }}<br></td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Job Role<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->job_role }}<br></td>
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Image<br></td>
                <img src="{{ asset('images/membership_enquiries/'.$enquiries->image) }}"  alt="your image" width="80px" height="60px" />
            </tr>
            <tr style="height: 35.0px;line-height: 35.0px;border-bottom: 1.0px solid rgb(221,221,221);">
                <td style="width: 50.0%;">Message<br></td>
                <td style="text-indent: 20.0px;">{{ $enquiries->message }}<br></td>
            </tr>
          
          
        </tbody>
    </table>
    <p><b>Note:</b>This email is automatically genereated from the greatjobsindia.com <br></p><br>
    <p>
    <h4>Thanks and Regards,</h4>
    </p>
    <p>DMW</p><br>
    Director ,
    <br> <span class="smini-hide font-size-h5 tracking-wider">
        <a class="" href="">
            <img src="{{ asset('front-assets/img/logo.png') }}" width="150" alt="Log">
        </a>
    </span>
    <br> Contact Number: +91 81900 41444
</body>

</html>