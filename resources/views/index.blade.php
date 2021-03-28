<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Relaciones ORM</title>
</head>

<body>

    <main class="container my-4 mx-auto">
        @foreach ($users as $user)
        <div class="holder">
            <div class="card border w-96 hover:shadow-none relative flex flex-col mx-auto shadow-lg m-5">
                <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/h0Vxgz5tyXA/download?force=true&w=640" alt="" />
                <div class="profile w-full flex m-3 ml-4 text-white">
                    <img class="w-28 h-28 p-1 bg-white rounded-full" src="{{$user->image->url}}" alt="" />
                    <div class="title mt-11 ml-3 font-bold flex flex-col">
                        <div class="name break-words">{{$user->name}}</div>
                        <div class="font-semibold text-sm italic text-gray-800">{{$user->email}}</div>
                    </div>
                </div>
                <div class="buttons flex absolute bottom-0 font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">
                    <a href="{{route('profile',$user)}}" class="add border rounded-l-2xl rounded-r-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Profile</a>
                    <a href="#" class="add border rounded-r-2xl rounded-l-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Grupos</a>
                </div>
            </div>
            <!-- card end -->
        </div>
        @endforeach
    </main>
</body>

</html>