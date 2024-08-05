<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>Neoncart </title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favourite_icon_01.png')}}">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- icon - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- animation - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">

    <!-- nice select - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/nice-select.css')}}">

    <!-- carousel - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">

    <!-- popup images & videos - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  
    <style>
        /* Dropdown container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown button */
.user_btn {
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
}

/* Dropdown button icon */
.user_btn .fas {
    margin-right: 8px;
}

/* Dropdown menu */
.dropdown-menu {
    display: none; /* Hide by default */
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    min-width: 160px;
    padding: 10px;
    border-radius: 4px;
}

/* Dropdown menu items */
.dropdown-menu .dropdown-item {
    display: block;
    padding: 8px 12px;
    color: #333;
    text-decoration: none;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #f1f1f1;
}

/* Show dropdown menu on hover */
.dropdown:hover .dropdown-menu {
    display: block;
}
    </style>
</head>