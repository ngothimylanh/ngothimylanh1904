#include<bits/stdc++.h>
using namespace std;
int UCLN(int a,int b)
{
    if(b==0)   return a;
    if(a%b==0)   return b;  
    return UCLN(b,a%b);
}
int main()
{
    int a,b;
    cin>>a>>b;
    cout<<UCLN(a,b);
}
