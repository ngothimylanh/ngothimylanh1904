#include<bits/stdc++.h>
using namespace std;
void convert(int n)
{
	if(n>0)
	{
		convert(n/2);  
		cout<<n%2;
	}
}
int main()
{
	int n;
	cin>>n;
	convert(n);
}
