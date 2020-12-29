<h1 align="center">搜索关键词管理</h1>

## 安装
```shell
$ composer require jncinet/qihucms-search
```

## 使用
### 数据迁移
```shell
$ php artisan migrate
```

### 发布资源
```shell
$ php artisan vendor:publish --provider="Qihucms\Search\SearchServiceProvider"
```

### 后台菜单
+ 搜索关键词：search/keywords

### 路由参数说明

#### 会员签到

```
route('api.search.keyword.index')
请求：GET
地址：/search/keywords?t=标识符（可选）&kw=关键词&limit=12（可选）
参数：
返回值：
{
    "data": [
        {
            'id': 1,
            'type_uri': "mall", // 标识
            'keyword': "美女",
            'count': 10,
            'created_at': "1秒前"
        },
        ...
    ],
    "meta":{},
    "links":{},
}

```

## 数据库
### 关键词表：search_keywords
| Field             | Type      | Length    | AllowNull | Default   | Comment   |
| :----             | :----     | :----     | :----     | :----     | :----     |
| id                | bigint    |           |           |           |           |
| type_uri          | varchar   | 255       | Y         | NULL      | 关键词识别符 |
| keyword           | varchar   | 255       |           |           | 关键词      |
| count             | int       |           |           | 0         | 搜索次数    |
| created_at        | timestamp |           | Y         | NULL      | 创建时间    |
| updated_at        | timestamp |           | Y         | NULL      | 更新时间    |
