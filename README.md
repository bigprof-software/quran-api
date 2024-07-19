# Quran Finder API

Quran Finder API is a simple API to get the verses of the Quran.

The major advantage of this API is speed. It is designed to be fast and lightweight, so it can be used in any application without any performance issues.
This is done by avoiding any processing or database queries, and instead serving the verses directly from static files.

This also makes the API very simple and easy to use. It only has a few endpoints, and the responses are plain text, which can be easily parsed and displayed in any application.

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
