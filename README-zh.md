# Laravel view shrinker

[English](README.md)|[中文](README-zh.md)

## 这是什么?

Laravel view shrinker是一个简单但有效的 `Laravel` 框架扩展包。

它提供了一个视图编译器，当编译并缓存 `Blade` 视图时，它将执行类似于twig的 `％spaceless` 函数的压缩操作。

因此，在编译时完成 `％spaceless` 功能，可以避免在运行时读取更大的缓存文件，这有助于提高视图渲染的速度。

## 使用指南

### 如何安装

```bash
composer install "hidehalo/laravel-view-shrinker"
```

### 如何使用

`Laravel` 将自动注册其服务提供商，覆盖默认的 `Blade` 视图编译器，不需要任何配置。

### 如何测试

```bash
./vendor/bin/test
```

## 证书

该项目依据MIT证书进行开源，更多信息请查看[证书文件](LICENSE)。
