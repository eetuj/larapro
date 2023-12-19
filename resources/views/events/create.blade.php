<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            width: 300px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 3%;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        ul {
            list-style-type: none;
            color: red;
            margin: 0;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 3%
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1>Create an Event</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{ route('event.store') }}">
        @csrf
        @method('post')

        <div>
            <label for="">Name</label>
            <input type="text" name='name' placeholder="Event name">
        </div>
        <div>
            <label for="">QTY</label>
            <input type="text" name='qty' placeholder="Qty">
        </div>
        <div>
            <label for="">Location</label>
            <input type="text" name='location' placeholder="location">
        </div>
        <div>
            <label for="">Choose Age</label>
            <select name='age' placeholder="age">
                <option value= "7-17">7-17</option>
                <option value= "18-22">18-22</option>
                <option value= "22+">&gt22</option>
            </select>
        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name='price' placeholder="Price">
        </div>
        <div>
            <label for="">Starting Date</label>
            <input type="date" name='starts_at' placeholder="date">
        </div>
        <div>
            <label for="">Schedule</label>
            <select name='event_type' placeholder="event_type">
                <option value= "Once">Once</option>
                <option value= "Weekly">Weekly</option>
                <option value= "Monthly">Monthly</option>
            </select>
        </div>
        <div>
            <label for="">Allow Audience</label>
            <input type="checkbox" name='allow_audience'>
        </div>
    
        <div>
            <label for="">Description</label>
            <input type="text" name='description' placeholder="Description">
        </div>
        <div>
            <input type="submit" value="SUBMIT A NEW EVENT">
        </div>
    </form>
    </div>
</body>

</html>
