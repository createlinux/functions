# 常用的函数和方法

## 基础运算

```php
/**
* $scale int 精度
 * 第二个参数为可变参数，数据类型为:array|int|float
 * 数组类型中只能包含int或者float
 */
Createlinux\Helper\Math\Basic::add(int $scale,[2,3,4,5],4,4.8,95);
Createlinux\Helper\Math\Basic::sub(int $scale,[2,3,4,5],4,4.8,95);
Createlinux\Helper\Math\Basic::div(int $scale,[2,3,4,5],4,4.8,95);
Createlinux\Helper\Math\Basic::mul(int $scale,[2,3,4,5],4,4.8,95);
```

## 自然语言处理
```php
//是否包含中文
Regular::hasChinese(string $string);
//是否包含日文
Regular::hasJapanese(string $string);
```

## 输出
```php
//print_r函数增加了换行符\n
println(string $anything)
```
