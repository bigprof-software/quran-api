# Quran Finder API

**Quran Finder API** is a streamlined and efficient API designed to provide verses from the Quran quickly and easily.

## Key Advantages

### Speed and Performance

The primary benefit of this API is its speed. It is engineered to be fast and lightweight, ensuring seamless integration into any application without performance concerns. This efficiency is achieved by serving verses directly from static files, eliminating the need for processing or database queries.

### Simplicity and Ease of Use

The API's simplicity is another significant advantage. With only a few endpoints and plain text responses, it is easy to parse and display the data in any application. This straightforward design makes it accessible for developers of all skill levels.

### Easy Deployment

Due to the absence of processing and database queries, the Quran Finder API can be deployed effortlessly on any server, including shared hosting environments. The reliance on static files ensures that the server can handle a high volume of requests without compromising performance.

### Security

Since the Quran Finder API does not involve any scripts or database queries, and serves data directly from static files, it is inherently secure. This design minimizes potential security vulnerabilities, making it as secure as serving static files from a server.

By leveraging these advantages, the Quran Finder API provides a reliable, efficient, and secure way to access Quran verses for any application.

## Get a verse by Surah and Ayah

Get a verse by its Surah number and Ayah number in the specified language.

```http
GET text/{lang}/{suraNum}/{ayaNum}/
```

### Parameters

* `{lang}` is the two-letter language code (`en` for English, `ar` for Arabic, etc.). Only `ar` is supported at the moment. More languages will be added in the future.
* `{suraNum}` is the Surah number (1-114).
* `{ayaNum}` is the Ayah number.

### Response

The response is a plain text of the verse in the specified language. If the verse is not found (e.g. invalid Surah number or Ayah number, or language code not supported), the response will be an empty string, along with a 404 status code.

### Example

```http
GET /text/ar/1/1/
```

#### Response

```
بسم الله الرحمن الرحيم
```

[Try it now](https://api.quran-finder.com/text/ar/1/1/)

## Get a diacritized verse by Surah and Ayah

Get a diacritized verse by its Surah number and Ayah number in the specified language. Only Arabic is supported for diacritized verses.

```http
GET text/{lang}/{suraNum}/{ayaNum}/diacritized/
```

### Parameters

* `{lang}` is the two-letter language code (`en` for English, `ar` for Arabic, etc.). Only `ar` is supported at the moment. More languages will be added in the future.
* `{suraNum}` is the Surah number (1-114).
* `{ayaNum}` is the Ayah number.

### Response

The response is a plain text of the diacritized verse in Arabic. If the verse is not found (e.g. invalid Surah number or Ayah number, or language code not supported), the response will be an empty string, along with a 404 status code.

### Example

```http
GET /text/ar/1/1/diacritized/
```

#### Response

```
بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
```

[Try it now](https://api.quran-finder.com/text/ar/1/1/diacritized/)
