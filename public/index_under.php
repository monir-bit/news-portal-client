<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>

    <style>
        :root {
            --primary: #0F9D58;
            --primary-dark: #0B8043;
            --bg: #F9FAFB;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--bg), #ffffff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
        }

        .container {
            text-align: center;
            max-width: 520px;
            padding: 40px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .icon {
            font-size: 64px;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: var(--primary);
        }

        p {
            font-size: 16px;
            color: var(--text-muted);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .progress {
            width: 100%;
            height: 10px;
            background: #E5E7EB;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .progress-bar {
            width: 65%;
            height: 100%;
            background: linear-gradient(
                    90deg,
                    var(--primary),
                    var(--primary-dark)
            );
            border-radius: 20px;
            animation: progress 2s ease-in-out infinite alternate;
        }

        @keyframes progress {
            from { width: 55%; }
            to { width: 75%; }
        }

        .footer {
            font-size: 14px;
            color: var(--text-muted);
        }

        .footer span {
            color: var(--primary);
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="icon">🚧</div>
    <h1>We’re Under Construction</h1>
    <p>
        Our website is currently being worked on.<br>
        We’ll be back very soon with something amazing!
    </p>

    <div class="progress">
        <div class="progress-bar"></div>
    </div>

    <div class="footer">
        © 2026 <span>Agamir Somoy</span> — All rights reserved
    </div>
</div>

</body>
</html>
