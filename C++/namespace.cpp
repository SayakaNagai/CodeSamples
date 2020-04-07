#include <iostream>

using namespace std;

namespace {

  void hello(){
    cout <<"Hello."<< endl;
  }

}

namespace Japanese {

  void hello(){
    cout <<"こんにちは。"<< endl;
  }

}

int main() {

  :hello();
  Japanese::hello();

}
