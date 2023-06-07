<?php
include'koneksi.php';
$tgl=date('Y-m-d');
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resell</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>

    <!-- ===== Main Container Start ===== -->
    <div>

        <div class="loading-screen">
            <div class="load-container">
                WELCOME
            </div>

            <div class="loading-page">
                <svg id="load-svg" width="425" height="95" viewBox="0 0 425 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="path-1-outside-1_1_6" maskUnits="userSpaceOnUse" x="0.59201" y="-0.600006" width="425" height="96" fill="black">
                    <rect fill="white" x="0.59201" y="-0.600006" width="425" height="96"/>
                    <path d="M63.776 92L43.296 63.2C40.992 63.456 38.6027 63.584 36.128 63.584H12.064V92H2.59201V2.39999H36.128C47.5627 2.39999 56.5227 5.13066 63.008 10.592C69.4933 16.0533 72.736 23.5627 72.736 33.12C72.736 40.1173 70.944 46.048 67.36 50.912C63.8613 55.6907 58.8267 59.1467 52.256 61.28L74.144 92H63.776ZM35.872 55.52C44.7467 55.52 51.5307 53.5573 56.224 49.632C60.9173 45.7067 63.264 40.2027 63.264 33.12C63.264 25.8667 60.9173 20.32 56.224 16.48C51.5307 12.5547 44.7467 10.592 35.872 10.592H12.064V55.52H35.872Z"/>
                    <path d="M121.972 84.576C126.153 84.576 129.993 83.8507 133.492 82.4C137.076 80.864 140.105 78.6453 142.58 75.744L147.7 81.632C144.713 85.216 141.001 87.9467 136.564 89.824C132.127 91.7013 127.22 92.64 121.844 92.64C114.932 92.64 108.788 91.1893 103.412 88.288C98.036 85.3013 93.8547 81.2053 90.868 76C87.8813 70.7947 86.388 64.9067 86.388 58.336C86.388 51.7653 87.796 45.8773 90.612 40.672C93.5133 35.4667 97.4813 31.4133 102.516 28.512C107.551 25.6107 113.268 24.16 119.668 24.16C125.641 24.16 131.017 25.5253 135.796 28.256C140.66 30.9867 144.5 34.784 147.316 39.648C150.217 44.512 151.753 50.0587 151.924 56.288L96.628 67.04C98.3347 72.5013 101.407 76.8107 105.844 79.968C110.367 83.04 115.743 84.576 121.972 84.576ZM119.668 31.968C114.975 31.968 110.751 33.0773 106.996 35.296C103.327 37.4293 100.425 40.4587 98.292 44.384C96.244 48.224 95.22 52.6613 95.22 57.696C95.22 58.976 95.2627 59.9147 95.348 60.512L142.836 51.296C141.812 45.664 139.209 41.056 135.028 37.472C130.847 33.8027 125.727 31.968 119.668 31.968Z"/>
                    <path d="M172.342 92.768C168.246 92.768 164.79 92 161.974 90.464C159.158 88.8427 157.067 86.7947 155.702 84.32C154.337 81.76 153.654 79.1147 153.654 76.384C153.654 73.568 154.337 71.136 155.702 69.088C156.982 66.9547 158.561 65.4187 160.438 64.48C163.766 58.5067 166.667 52.4907 169.142 46.432C171.617 40.288 173.963 33.6747 176.182 26.592L195.126 24.032C195.553 34.9547 196.278 46.7733 197.302 59.488C197.729 64.608 197.942 68.32 197.942 70.624C197.942 72.5867 197.771 74.208 197.43 75.488C201.441 73.184 204.513 71.0507 206.646 69.088H212.022C206.561 75.4027 200.033 80.736 192.438 85.088C189.963 87.7333 186.891 89.696 183.222 90.976C179.638 92.1707 176.011 92.768 172.342 92.768ZM168.246 82.656C171.403 82.656 174.049 81.7173 176.182 79.84C178.315 77.9627 179.382 74.9333 179.382 70.752C179.382 68.192 179.126 64.608 178.614 60C177.761 50.272 177.206 43.744 176.95 40.416C174.902 47.1573 171.446 55.2213 166.582 64.608C168.545 65.632 169.526 67.1253 169.526 69.088C169.526 70.7093 168.971 72.16 167.862 73.44C166.838 74.72 165.515 75.36 163.894 75.36C162.102 75.36 160.95 74.8053 160.438 73.696C160.438 76.768 161.035 79.0293 162.23 80.48C163.51 81.9307 165.515 82.656 168.246 82.656Z"/>
                    <path d="M224.929 92.768C218.614 92.768 213.708 91.1467 210.209 87.904C206.71 84.576 204.961 79.4133 204.961 72.416C204.961 66.528 206.113 60.0427 208.417 52.96C210.721 45.8773 214.476 39.776 219.681 34.656C224.886 29.4507 231.5 26.848 239.521 26.848C248.908 26.848 253.601 30.944 253.601 39.136C253.601 43.9147 252.236 48.3093 249.505 52.32C246.774 56.3307 243.148 59.5733 238.625 62.048C234.102 64.4373 229.281 65.8027 224.161 66.144C223.99 68.704 223.905 70.4107 223.905 71.264C223.905 75.4453 224.63 78.304 226.081 79.84C227.532 81.2907 229.878 82.016 233.121 82.016C237.729 82.016 241.654 80.9493 244.897 78.816C248.225 76.6827 251.852 73.44 255.777 69.088H260.129C250.657 84.8747 238.924 92.768 224.929 92.768ZM225.185 60C228.342 59.8293 231.329 58.72 234.145 56.672C237.046 54.624 239.35 52.0213 241.057 48.864C242.849 45.7067 243.745 42.3787 243.745 38.88C243.745 35.3813 242.678 33.632 240.545 33.632C237.473 33.632 234.444 36.32 231.457 41.696C228.556 47.072 226.465 53.1733 225.185 60Z"/>
                    <path d="M268.422 92.768C264.326 92.768 260.998 91.488 258.438 88.928C255.963 86.368 254.726 82.528 254.726 77.408C254.726 75.2747 255.067 72.5013 255.75 69.088L269.446 4.96L288.39 2.39999L273.67 71.52C273.329 72.8 273.158 74.1653 273.158 75.616C273.158 77.3227 273.542 78.56 274.31 79.328C275.163 80.0107 276.529 80.352 278.406 80.352C280.881 80.352 283.185 79.328 285.318 77.28C287.451 75.1467 288.987 72.416 289.926 69.088H295.302C292.145 78.304 288.091 84.576 283.142 87.904C278.193 91.1467 273.286 92.768 268.422 92.768Z"/>
                    <path d="M302.547 92.768C298.451 92.768 295.123 91.488 292.563 88.928C290.088 86.368 288.851 82.528 288.851 77.408C288.851 75.2747 289.192 72.5013 289.875 69.088L303.571 4.96L322.515 2.39999L307.795 71.52C307.454 72.8 307.283 74.1653 307.283 75.616C307.283 77.3227 307.667 78.56 308.435 79.328C309.288 80.0107 310.654 80.352 312.531 80.352C315.006 80.352 317.31 79.328 319.443 77.28C321.576 75.1467 323.112 72.416 324.051 69.088H329.427C326.27 78.304 322.216 84.576 317.267 87.904C312.318 91.1467 307.411 92.768 302.547 92.768Z"/>
                    <path d="M342.304 92.768C335.989 92.768 331.083 91.1467 327.584 87.904C324.085 84.576 322.336 79.4133 322.336 72.416C322.336 66.528 323.488 60.0427 325.792 52.96C328.096 45.8773 331.851 39.776 337.056 34.656C342.261 29.4507 348.875 26.848 356.896 26.848C366.283 26.848 370.976 30.944 370.976 39.136C370.976 43.9147 369.611 48.3093 366.88 52.32C364.149 56.3307 360.523 59.5733 356 62.048C351.477 64.4373 346.656 65.8027 341.536 66.144C341.365 68.704 341.28 70.4107 341.28 71.264C341.28 75.4453 342.005 78.304 343.456 79.84C344.907 81.2907 347.253 82.016 350.496 82.016C355.104 82.016 359.029 80.9493 362.272 78.816C365.6 76.6827 369.227 73.44 373.152 69.088H377.504C368.032 84.8747 356.299 92.768 342.304 92.768ZM342.56 60C345.717 59.8293 348.704 58.72 351.52 56.672C354.421 54.624 356.725 52.0213 358.432 48.864C360.224 45.7067 361.12 42.3787 361.12 38.88C361.12 35.3813 360.053 33.632 357.92 33.632C354.848 33.632 351.819 36.32 348.832 41.696C345.931 47.072 343.84 53.1733 342.56 60Z"/>
                    <path d="M381.829 28H400.261L398.597 35.936C401.498 33.376 404.101 31.4133 406.405 30.048C408.794 28.6827 411.354 28 414.085 28C416.816 28 418.949 28.9387 420.485 30.816C422.106 32.6933 422.917 34.9547 422.917 37.6C422.917 40.0747 422.106 42.2507 420.485 44.128C418.864 46.0053 416.602 46.944 413.701 46.944C411.824 46.944 410.544 46.5173 409.861 45.664C409.264 44.7253 408.794 43.4027 408.453 41.696C408.197 40.5867 407.941 39.776 407.685 39.264C407.429 38.752 406.96 38.496 406.277 38.496C404.485 38.496 402.949 38.88 401.669 39.648C400.474 40.3307 398.896 41.568 396.933 43.36L386.693 92H368.261L381.829 28Z"/>
                    </mask>
                    <path d="M63.776 92L43.296 63.2C40.992 63.456 38.6027 63.584 36.128 63.584H12.064V92H2.59201V2.39999H36.128C47.5627 2.39999 56.5227 5.13066 63.008 10.592C69.4933 16.0533 72.736 23.5627 72.736 33.12C72.736 40.1173 70.944 46.048 67.36 50.912C63.8613 55.6907 58.8267 59.1467 52.256 61.28L74.144 92H63.776ZM35.872 55.52C44.7467 55.52 51.5307 53.5573 56.224 49.632C60.9173 45.7067 63.264 40.2027 63.264 33.12C63.264 25.8667 60.9173 20.32 56.224 16.48C51.5307 12.5547 44.7467 10.592 35.872 10.592H12.064V55.52H35.872Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M121.972 84.576C126.153 84.576 129.993 83.8507 133.492 82.4C137.076 80.864 140.105 78.6453 142.58 75.744L147.7 81.632C144.713 85.216 141.001 87.9467 136.564 89.824C132.127 91.7013 127.22 92.64 121.844 92.64C114.932 92.64 108.788 91.1893 103.412 88.288C98.036 85.3013 93.8547 81.2053 90.868 76C87.8813 70.7947 86.388 64.9067 86.388 58.336C86.388 51.7653 87.796 45.8773 90.612 40.672C93.5133 35.4667 97.4813 31.4133 102.516 28.512C107.551 25.6107 113.268 24.16 119.668 24.16C125.641 24.16 131.017 25.5253 135.796 28.256C140.66 30.9867 144.5 34.784 147.316 39.648C150.217 44.512 151.753 50.0587 151.924 56.288L96.628 67.04C98.3347 72.5013 101.407 76.8107 105.844 79.968C110.367 83.04 115.743 84.576 121.972 84.576ZM119.668 31.968C114.975 31.968 110.751 33.0773 106.996 35.296C103.327 37.4293 100.425 40.4587 98.292 44.384C96.244 48.224 95.22 52.6613 95.22 57.696C95.22 58.976 95.2627 59.9147 95.348 60.512L142.836 51.296C141.812 45.664 139.209 41.056 135.028 37.472C130.847 33.8027 125.727 31.968 119.668 31.968Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M172.342 92.768C168.246 92.768 164.79 92 161.974 90.464C159.158 88.8427 157.067 86.7947 155.702 84.32C154.337 81.76 153.654 79.1147 153.654 76.384C153.654 73.568 154.337 71.136 155.702 69.088C156.982 66.9547 158.561 65.4187 160.438 64.48C163.766 58.5067 166.667 52.4907 169.142 46.432C171.617 40.288 173.963 33.6747 176.182 26.592L195.126 24.032C195.553 34.9547 196.278 46.7733 197.302 59.488C197.729 64.608 197.942 68.32 197.942 70.624C197.942 72.5867 197.771 74.208 197.43 75.488C201.441 73.184 204.513 71.0507 206.646 69.088H212.022C206.561 75.4027 200.033 80.736 192.438 85.088C189.963 87.7333 186.891 89.696 183.222 90.976C179.638 92.1707 176.011 92.768 172.342 92.768ZM168.246 82.656C171.403 82.656 174.049 81.7173 176.182 79.84C178.315 77.9627 179.382 74.9333 179.382 70.752C179.382 68.192 179.126 64.608 178.614 60C177.761 50.272 177.206 43.744 176.95 40.416C174.902 47.1573 171.446 55.2213 166.582 64.608C168.545 65.632 169.526 67.1253 169.526 69.088C169.526 70.7093 168.971 72.16 167.862 73.44C166.838 74.72 165.515 75.36 163.894 75.36C162.102 75.36 160.95 74.8053 160.438 73.696C160.438 76.768 161.035 79.0293 162.23 80.48C163.51 81.9307 165.515 82.656 168.246 82.656Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M224.929 92.768C218.614 92.768 213.708 91.1467 210.209 87.904C206.71 84.576 204.961 79.4133 204.961 72.416C204.961 66.528 206.113 60.0427 208.417 52.96C210.721 45.8773 214.476 39.776 219.681 34.656C224.886 29.4507 231.5 26.848 239.521 26.848C248.908 26.848 253.601 30.944 253.601 39.136C253.601 43.9147 252.236 48.3093 249.505 52.32C246.774 56.3307 243.148 59.5733 238.625 62.048C234.102 64.4373 229.281 65.8027 224.161 66.144C223.99 68.704 223.905 70.4107 223.905 71.264C223.905 75.4453 224.63 78.304 226.081 79.84C227.532 81.2907 229.878 82.016 233.121 82.016C237.729 82.016 241.654 80.9493 244.897 78.816C248.225 76.6827 251.852 73.44 255.777 69.088H260.129C250.657 84.8747 238.924 92.768 224.929 92.768ZM225.185 60C228.342 59.8293 231.329 58.72 234.145 56.672C237.046 54.624 239.35 52.0213 241.057 48.864C242.849 45.7067 243.745 42.3787 243.745 38.88C243.745 35.3813 242.678 33.632 240.545 33.632C237.473 33.632 234.444 36.32 231.457 41.696C228.556 47.072 226.465 53.1733 225.185 60Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M268.422 92.768C264.326 92.768 260.998 91.488 258.438 88.928C255.963 86.368 254.726 82.528 254.726 77.408C254.726 75.2747 255.067 72.5013 255.75 69.088L269.446 4.96L288.39 2.39999L273.67 71.52C273.329 72.8 273.158 74.1653 273.158 75.616C273.158 77.3227 273.542 78.56 274.31 79.328C275.163 80.0107 276.529 80.352 278.406 80.352C280.881 80.352 283.185 79.328 285.318 77.28C287.451 75.1467 288.987 72.416 289.926 69.088H295.302C292.145 78.304 288.091 84.576 283.142 87.904C278.193 91.1467 273.286 92.768 268.422 92.768Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M302.547 92.768C298.451 92.768 295.123 91.488 292.563 88.928C290.088 86.368 288.851 82.528 288.851 77.408C288.851 75.2747 289.192 72.5013 289.875 69.088L303.571 4.96L322.515 2.39999L307.795 71.52C307.454 72.8 307.283 74.1653 307.283 75.616C307.283 77.3227 307.667 78.56 308.435 79.328C309.288 80.0107 310.654 80.352 312.531 80.352C315.006 80.352 317.31 79.328 319.443 77.28C321.576 75.1467 323.112 72.416 324.051 69.088H329.427C326.27 78.304 322.216 84.576 317.267 87.904C312.318 91.1467 307.411 92.768 302.547 92.768Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M342.304 92.768C335.989 92.768 331.083 91.1467 327.584 87.904C324.085 84.576 322.336 79.4133 322.336 72.416C322.336 66.528 323.488 60.0427 325.792 52.96C328.096 45.8773 331.851 39.776 337.056 34.656C342.261 29.4507 348.875 26.848 356.896 26.848C366.283 26.848 370.976 30.944 370.976 39.136C370.976 43.9147 369.611 48.3093 366.88 52.32C364.149 56.3307 360.523 59.5733 356 62.048C351.477 64.4373 346.656 65.8027 341.536 66.144C341.365 68.704 341.28 70.4107 341.28 71.264C341.28 75.4453 342.005 78.304 343.456 79.84C344.907 81.2907 347.253 82.016 350.496 82.016C355.104 82.016 359.029 80.9493 362.272 78.816C365.6 76.6827 369.227 73.44 373.152 69.088H377.504C368.032 84.8747 356.299 92.768 342.304 92.768ZM342.56 60C345.717 59.8293 348.704 58.72 351.52 56.672C354.421 54.624 356.725 52.0213 358.432 48.864C360.224 45.7067 361.12 42.3787 361.12 38.88C361.12 35.3813 360.053 33.632 357.92 33.632C354.848 33.632 351.819 36.32 348.832 41.696C345.931 47.072 343.84 53.1733 342.56 60Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                    <path d="M381.829 28H400.261L398.597 35.936C401.498 33.376 404.101 31.4133 406.405 30.048C408.794 28.6827 411.354 28 414.085 28C416.816 28 418.949 28.9387 420.485 30.816C422.106 32.6933 422.917 34.9547 422.917 37.6C422.917 40.0747 422.106 42.2507 420.485 44.128C418.864 46.0053 416.602 46.944 413.701 46.944C411.824 46.944 410.544 46.5173 409.861 45.664C409.264 44.7253 408.794 43.4027 408.453 41.696C408.197 40.5867 407.941 39.776 407.685 39.264C407.429 38.752 406.96 38.496 406.277 38.496C404.485 38.496 402.949 38.88 401.669 39.648C400.474 40.3307 398.896 41.568 396.933 43.36L386.693 92H368.261L381.829 28Z" stroke="white" stroke-width="4" mask="url(#path-1-outside-1_1_6)"/>
                </svg>

                <div class="load-name-container">
                    <div class="load-logo-name">
                        netmarket
                    </div>
                </div>
            </div>
        </div>
    
        <!-- ===== Main Navigation Bar Container Start ===== -->
        <header class="">
                
            <!-- ===== Mini Navigation Bar Container Start ===== -->
            <div class="navbar-wrapper">

                <!-- ===== Navigation Bar Container Start ===== -->
                <nav class="mini-navbar-box">

                    <!-- ===== Social Navigation Bar Container Start ===== -->
                    <div class="social">
                        <a href="#" class="support" data-page="index-data">Admin</a>
                        <a href="#" class="contact ZUq1cc flex">About</a>
                        <div href="#" class="media ZUq1cc flex HniJJe _2TLLZP">Social Media :</div>
                        <div class="flex _2TLLZP FK3705">
                            <a href="#" class="D7dyDc header-navbar-background header-navbar-facebook-png" target="_blank" rel="noopener noreferrer"></a>
                            <a href="#" class="VR+xYc header-navbar-background header-navbar-instagram-png" target="_blank" rel="noopener noreferrer"></a>
                            <a href="#" class=""></a>
                        </div>
                    </div>
                    <!-- ===== Social Navigation Bar Container End ===== -->

                    <div class="navbar__spacer"></div>
                    <div class="navbar__spacer"></div>

                </nav>
                <!-- ===== Navigation Bar Container End ===== -->

            </div>
            <!-- ===== Mini Navigation Bar Container End ===== -->
            
            <div class="nav1">
                <div class="navbar2">
                    <i class='bx bx-menu'></i>
                    <div class="logo"><a href="index.php?p=beranda"><span>Re</span>sell</a></div>
                    <div class="nav-links">

                        <!-- Logo -->
                        <div class="sidebar-logo">
                        <span class="logo-name"><span>Re</span>sell</span>
                        <i class='bx bx-x' ></i>
                        </div>
                        <!-- Logo -->

                        <!-- Main Menu -->
                        <ul class="links">

                            <!-- Home -->
                            <li><a href="index.php?p=beranda" id="active-btns11"><span class="" id="active-btns1">HOME</span></a></li>
                            <!-- Home -->

                            <!-- Product -->
                            <li><a href="index.php?p=result-produk" id="active-btns12"><span class="" id="active-btns2">PRODUCT</span></a></li>
                            <!-- Product -->
                            <!-- <li>
                                <a href="#">CATEGORY</a>
                                <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                                <ul class="htmlCss-sub-menu sub-menu">
                                    <li><a href="#">Makanan</a></li>
                                    <li><a href="#">Teknologi</a></li>
                                    <li><a href="#">Stylist</a></li>
                                    <li class="more">
                                        <span><a href="#">More</a>
                                        <i class='bx bxs-chevron-right arrow more-arrow'></i></span>
                                        <ul class="more-sub-menu sub-menu">
                                            <li><a href="#">Neumorphism</a></li>
                                            <li><a href="#">Pre-loader</a></li>
                                            <li><a href="#">Glassmorphism</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->

                            <!-- <li><a href="#">ABOUT</a></li> -->

                            <!-- Shop -->
                            <li>
                                <a href="#">SHOP</a>
                                <i class='bx bxs-chevron-down js-arrow arrow '></i>
                                <ul class="js-sub-menu sub-menu">
                                <li><a href="https://shopee.co.id/adrianfachreza?utm_content=4BVMZB9sx6Hi81VzyFeead54Y6rj" target="_blank"><span class="" id="active-btns3">Shopee</span></a></li>
                                <li><a href="https://tokopedia.link/IxOzmAuVlAb" target="_blank"><span class="" id="active-btns4">Tokopedia</span></a></li>
                                </ul>
                            </li>
                            <!-- Shop -->
                        </ul>
                        <!-- Main Menu -->
                        <script>
                            var currentURL = window.location.href;

                            var link1 = document.getElementById("active-btns11");
                            var span1 = document.getElementById("active-btns1");
                            var link2 = document.getElementById("active-btns12");
                            var span2 = document.getElementById("active-btns2");

                            if (currentURL.indexOf(link1.href) !== -1) {
                            span1.classList.add("active");
                            } else if (currentURL.indexOf(link2.href) !== -1) {
                            span2.classList.add("active");
                            }
                        </script>

                    </div>
                    <div class="search-box">
                        <i class='bx bx-search'></i>
                        <div class="input-box">
                            <form action="index.php?p=result-produk" method="POST">
                                <input type="text" name="pencarian" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- ===== Main Navigation Bar Container End ===== -->

        <div id="loginContainer"></div>
        <div id="overlay" class="overlay"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/header-admin.js?v=<?php echo time(); ?>"></script>

        <?php

            $pages_dir='pages';
            $pages_dir1='pages\admin';
			if(!empty($_GET['p'])){
                $p=$_GET['p'];
                $pages=scandir($pages_dir,0);
                unset($pages[0],$pages[1]);
                $pages1=scandir($pages_dir1,0);
                unset($pages1[0],$pages1[1]);
                if (in_array($p.'.php',$pages)) {
                    include($pages_dir.'/'.$p.'.php');
                }
                elseif (in_array($p.'.php',$pages1)) {
                    include($pages_dir1.'/'.$p.'.php');
                }
                else {
                    echo'Halaman Tidak Ditemukan';
                }
			}else{
				include($pages_dir.'/beranda.php');
			}

		?>


    </div>    
    <!-- ===== Main Container End ===== -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js?"></script>
    <script src="js/script.js?v=<?php echo time(); ?>"></script>

    <div class="link-produk-btn2">
        <div class="toggle-pesan" onclick="togglePesanBox()">
            <button class="tombol-pesan"><i class="fab fa-whatsapp"></i></button>
        </div>
        <!-- Kotak pesan -->
        <div class="pesan-box" id="pesanBox">
            <div class="atur-display-pesan">
                <button class="tombol-silang" onclick="togglePesanBox()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="atur-display-isi">
                    <textarea class="teks-pesan" id="textareaPesan" placeholder="Tulis pesan Anda">Halo Admin, </textarea>
                    <button class="kirim-pesan" onclick="kirimPesan()"><i class='bx bxs-send'></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // kotak pesan
        // Fungsi untuk membuka/menutup kotak pesan
        var pesanBoxVisible = false;

        function togglePesanBox() {
            var pesanBox = document.getElementById('pesanBox');
            if (!pesanBoxVisible) {
                pesanBox.style.display = 'block';
                pesanBoxVisible = true;
            } else {
                pesanBox.style.display = 'none';
                pesanBoxVisible = false;
            }
        }

        // Fungsi untuk mengirim pesan ke WhatsApp
        function kirimPesan() {
            var teksPesan = document.querySelector('.teks-pesan').value;
            var encodedPesan = encodeURIComponent(teksPesan);
            var whatsappURL = 'https://wa.me/6285349111065?text=' + encodedPesan;
            window.open(whatsappURL, '_blank');
        }

        //   automatic height textarea
        // Ambil elemen textarea
        var textareaPesan = document.getElementById('textareaPesan');

        // Fungsi untuk mengatur tinggi textarea
        function aturTinggiTextarea() {
            textareaPesan.style.height = 'auto'; // Setel kembali ke tinggi otomatis
            textareaPesan.style.height = textareaPesan.scrollHeight + 'px'; // Atur tinggi textarea sesuai tinggi konten
        }

        // Panggil fungsi aturTinggiTextarea saat textarea berubah
        textareaPesan.addEventListener('input', aturTinggiTextarea);

        // Panggil fungsi aturTinggiTextarea saat halaman dimuat
        window.addEventListener('load', aturTinggiTextarea);
    </script>
</body>

</html>