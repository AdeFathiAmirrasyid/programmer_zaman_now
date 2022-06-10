class ValidationException implements Exception {
  String message;
  ValidationException(this.message);
}

class Validation {
  static void validate(String username, String password) {
    if (username == "") {
      throw ValidationException('Username is blank');
    } else if (password == "") {
      throw ValidationException('Password is blank');
    } else if (username != 'insani' || password != 'insani') {
      throw Exception('Login Failed');
    }
  }
}

void main() {
  try {
    Validation.validate("insani", "alisia");
  } on ValidationException catch (exception, stackTrace) {
    print('Validation ERROR : ${exception.message}');
    print('Stack Trace : ${stackTrace.toString()}');
  } on Exception catch (exception, stackTrace) {
    print('ERROR : ${exception.toString()}');
    print('Stack Trace : ${stackTrace.toString()}');
  } finally {
    print('finally');
  }

  try {
    Validation.validate("insani", "insani");
  } catch (exception) {
    print('ERROR : ${exception.toString()}');
  } finally {
    print('finally');
  }


  print('Selesai');
}
