#include <string>
using namespace std;

class AnggotaDPR {
private:
    unsigned int id;
    string nama, bidang, partai;

public:
    AnggotaDPR(unsigned int, string, string, string);
    AnggotaDPR();
    ~AnggotaDPR();

    void setId(unsigned int);
    void setNama(string);
    void setBidang(string);
    void setPartai(string);

    unsigned int ambilId();
    string ambilNama();
    string ambilBidang();
    string ambilPartai();
};