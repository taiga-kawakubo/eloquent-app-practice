<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>削除済み投稿一覧</title>

    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            color: #333;
            background-color: #f8f9fa;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .summary {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #fafafa;
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            text-decoration: none;
            border: 1px solid #333;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-restore {
            background-color: #28a745;
            color: white;
            border-color: #28a745;
        }

        .btn-restore:hover {
            background-color: #218838;
        }

        .btn-back {
            background-color: white;
            color: #333;
        }

        .btn-back:hover {
            background-color: #f5f5f5;
        }

        .navigation {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>削除済み投稿一覧</h1>

    <p class="summary">
        全{{ count($posts) }}件の削除済み投稿があります。
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>公開日時</th>
                <th>もとに戻す</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>

                    <td>{{ $post->title }}</td>

                    <td>
                        {{ $post->published_at?->format('Y/m/d H:i') ?? '下書き' }}
                    </td>

                    <td>
                        <form
                            action="/posts/{{ $post->id }}/restore"
                            method="POST"
                            style="display:inline;"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-restore"
                            >
                                もとに戻す
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="navigation">
        <a href="/posts" class="btn btn-back">
            ← 一覧に戻る
        </a>
    </p>

</body>
</html>